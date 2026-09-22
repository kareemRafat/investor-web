<?php

namespace Tests\Feature;

use App\Enums\PlanType;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create([
            'role' => UserRole::ADMIN,
            'status' => UserStatus::ACTIVE,
            'plan_type' => PlanType::FREE,
            'contact_credits' => 0,
        ]);
    }

    /** @test */
    public function it_renders_slim_users_table(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->get('/admin/users')
            ->assertOk()
            ->assertSee('الاسم', false)
            ->assertSee('البريد الإلكتروني', false)
            ->assertSee('الباقة', false)
            ->assertDontSee('إجمالي الدفع', false);
    }

    /** @test */
    public function it_renders_user_detail_page_with_sections(): void
    {
        $admin = $this->admin();
        $user = User::factory()->create([
            'role' => UserRole::USER,
            'status' => UserStatus::ACTIVE,
            'plan_type' => PlanType::FREE,
            'contact_credits' => 5,
        ]);

        $this->actingAs($admin)
            ->get("/admin/users/{$user->getKey()}")
            ->assertOk()
            ->assertSee('البيانات الشخصية', false)
            ->assertSee('بيانات الحساب', false)
            ->assertSee('الإحصائيات', false)
            ->assertSee('عروض الإستثمار', false)
            ->assertSee($user->name, false);
    }
}
