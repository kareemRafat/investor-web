# Feature Implementation Plan
## Paid Contact & Subscription Logic

> Stack: **Laravel 12 + Livewire 3 + FilamentPHP 4**  
> Scope: إضافة منطق فتح بيانات التواصل (مجاني / مدفوع) بدون بوابة دفع حقيقية (Mock فقط)

---

## 1. الهدف من الـ Feature
- منع كشف هوية صاحب الفكرة / المستثمر افتراضيًا
- السماح بالتواصل فقط عبر:
  - دفع لكل مرة (9$ – لاحقًا)
  - أو اشتراك مدفوع (رصيد شهري)
- تجهيز المنصة تقنيًا لاستقبال بوابة دفع لاحقًا بدون إعادة هيكلة

---

## 2. الوضع الحالي (As-Is)
- Users موجودين
- Ideas + Investors موجودين
- لا يوجد:
  - نظام اشتراكات
  - نظام رصيد
  - منطق فتح بيانات التواصل

---

## 3. التعديلات على قاعدة البيانات (DB Changes)

### 3.1 جدول users (تعديل)
إضافة أعمدة:
```sql
plan_type ENUM('free','monthly','yearly') DEFAULT 'free'
contact_credits INT DEFAULT 0
credits_reset_at DATETIME NULL
```

---

### 3.2 جدول جديد: subscriptions
```sql
id
user_id
plan_type (monthly/yearly)
starts_at
ends_at
status (active/expired/cancelled)
```

---

### 3.3 جدول جديد: contact_unlocks
لتسجيل كل عملية فتح بيانات
```sql
id
user_id
unlockable_type (Idea/Investor)
unlockable_id
method (credit/pay_per_use)
created_at
```

---

### 3.4 تعديل ideas / investors
إضافة:
```sql
contact_visibility ENUM('open','closed') DEFAULT 'closed'
```

---

## 4. منطق الاشتراكات (Business Logic)

### 4.1 الخطط
- Free:
  - contact_visibility = closed
  - فتح البيانات = Pay-per-use (Mock)

- Monthly:
  - 10 credits شهريًا
  - فتح بيانات التواصل بدون دفع مباشر

- Yearly:
  - نفس الشهري
  - تجديد credits شهريًا

---

### 4.2 Reset credits (Scheduled Job)
- كل شهر:
  - contact_credits = 10
  - update credits_reset_at

---

## 5. منطق فتح بيانات التواصل (Core Feature)

### 5.1 عند عرض فكرة / مستثمر
- لا تظهر بيانات المستخدم (name, phone, email)
- يظهر زر:
  > "تواصل مع صاحب الفكرة / المستثمر"

---

### 5.2 عند الضغط على زر التواصل

#### Case 1: contact_visibility = open
- عرض البيانات مباشرة

#### Case 2: contact_visibility = closed

**User = Free**
- تسجيل unlock بمحاكاة pay_per_use
- السماح بالعرض (Mock)

**User = Paid**
- إذا contact_credits > 0:
  - خصم 1 credit
  - تسجيل unlock
- إذا contact_credits = 0:
  - fallback إلى pay_per_use (Mock)

---

## 6. منطق إضافة فكرة / مستثمر

### 6.1 Form (Livewire / Filament)
- حقل جديد:
  ```
  contact_visibility (open / closed)
  ```

### 6.2 Validation
- open مسموح فقط لو:
  - user.plan_type != free
  - contact_credits > 0

---

## 7. Filament Admin Changes

### 7.1 Resources
- IdeasResource
- InvestorsResource

إضافة:
- Badge لحالة contact_visibility
- Column لعدد مرات فتح البيانات

---

### 7.2 Actions
- Toggle contact_visibility (Admin only)
- Reset user credits (Admin only)

---

## 8. UI / UX Changes

### 8.1 Public Pages
- إخفاء بيانات التواصل
- CTA واضح للتواصل

### 8.2 Dashboard المستخدم
- عرض:
  - plan_type
  - contact_credits
  - تاريخ التجديد القادم

---

## 9. Mock Payment Layer (بدون بوابة حقيقية)

### 9.1 Service Class
```php
PaymentService::mockPayPerUse()
PaymentService::mockSubscribe($plan)
```

### 9.2 الهدف
- اختبار الفلو
- ربطه لاحقًا مع Stripe / Paymob بدون تغيير Logic

---

## 10. ترتيب التنفيذ المقترح

1. DB migrations
2. Models & Relations
3. Credit Logic Service
4. Unlock Logic
5. UI Changes
6. Admin Controls
7. Scheduled Job (Credits reset)

---

## 11. ملاحظات مهمة
- لا يتم كشف أي بيانات حساسة في API
- كل فتح بيانات يجب أن يُسجَّل
- النظام قابل للتوسع لاحقًا (Payments / Analytics)

---

**هذا الملف مصمم ليُستخدم مباشرة مع أي AI CLI لتنفيذ المهام خطوة بخطوة.**

