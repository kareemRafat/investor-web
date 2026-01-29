# Contact Access & Billing Plan (plan.md)

## 1. الهدف (Objective)
بناء نظام ذكي للتحكم في عرض بيانات التواصل للأفكار/العروض، بحيث:
- المستثمر (Viewer) لا يدفع أي شيء.
- الخصم يتم دائمًا من صاحب الفكرة (Owner).
- الخصم يحدث مرة واحدة فقط لكل مستثمر لكل فكرة.
- النظام يدعم الاشتراكات، الرصيد، والتوسّع مستقبلاً.

---

## 2. التعريفات (Roles & Terms)
- **Owner (Entrepreneur)**: صاحب الفكرة أو العرض.
- **Viewer (Investor / User)**: المستخدم الذي يشاهد الفكرة.
- **Contact Data**: الهاتف، الإيميل، أو أي وسيلة تواصل.
- **Lead View**: أول مرة يشاهد فيها Viewer بيانات التواصل لفكرة معينة.

---

## 3. القاعدة الذهبية (Golden Rule)
> الخصم يتم دائمًا من صاحب الفكرة، وليس من المستخدم الذي يشاهد.

---

## 4. سيناريوهات العمل (Business Scenarios)

### 4.1 مشاهدة بيانات التواصل
1. Viewer يفتح صفحة فكرة.
2. النظام يتحقق:
   - هل بيانات التواصل مفتوحة؟
   - هل Viewer شاهد البيانات من قبل؟
3. إذا لم يشاهد من قبل:
   - يتم الخصم من Owner (رصيد أو اشتراك).
   - يتم تسجيل العملية.
4. إذا شاهد من قبل:
   - يتم عرض البيانات مباشرة بدون خصم.

---

### 4.2 حالات الخصم

#### الحالة A: Owner لديه رصيد أو اشتراك فعال
- عرض البيانات فورًا.
- خصم 1 Credit من Owner.

#### الحالة B: Owner لا يملك رصيدًا
- إخفاء بيانات التواصل.
- عرض رسالة مناسبة للـ Viewer.
- إشعار Owner بضرورة الشحن أو التجديد.

---

## 5. التحكم في الاستنزاف (Anti-Abuse)
- الخصم يتم **مرة واحدة فقط** لكل (Viewer + Idea).
- يمكن إضافة حد مجاني (مثلاً أول 5 مشاهدات) إن لزم لاحقًا.

---

## 6. التعديلات على قاعدة البيانات (DB Changes)

### 6.1 users (تعديل)
- plan_type (free / monthly / yearly)
- contact_credits
- credits_reset_at

---

### 6.2 subscriptions (جدول جديد)
- id
- user_id
- plan_type
- starts_at
- ends_at
- status

---

### 6.3 contact_views (جدول جديد)
لتسجيل كل مشاهدة بيانات تواصل.

- id
- idea_id
- viewer_id
- owner_id
- created_at

> يستخدم لمنع الخصم المكرر.

---

### 6.4 contact_unlocks (اختياري / للتوسعة)
لتسجيل كل عملية خصم.

- id
- user_id (Owner)
- unlockable_type
- unlockable_id
- method (subscription / credit)
- created_at

---

## 7. منطق التنفيذ (Execution Logic)

### Pseudo Code
```php
if (!contactViewedBefore(idea, viewer)) {
    if (ownerHasCreditsOrSubscription(idea->owner)) {
        deductFromOwner(idea->owner);
        markContactAsViewed(idea, viewer);
        showContact();
    } else {
        hideContact();
    }
} else {
    showContact();
}
```

---

## 8. واجهة المستخدم (UX Rules)

### Viewer (Investor)
- لا يظهر له أي دفع.
- لا يظهر له أي رصيد.
- يرى البيانات أو رسالة عدم الإتاحة فقط.

### Owner (Entrepreneur)
- Dashboard يظهر:
  - عدد المشاهدات.
  - الرصيد المتبقي.
  - تنبيه عند قرب النفاذ.

---

## 9. نقاط توسّع مستقبلية (Future Enhancements)
- تسعير مختلف حسب نوع الفكرة.
- حد أقصى مشاهدات يومي.
- Analytics متقدم (conversion rate).

---

## 10. ملاحظات تنفيذية (Implementation Notes)
- لا يتم الخصم داخل Controller مباشرة.
- يُفضّل استخدام Service Class مثل:
  - ContactAccessService
- كل عمليات الخصم تكون داخل Transaction.

---

**End of plan.md**