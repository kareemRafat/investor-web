<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use UnitEnum;

class ManageSettings extends Page implements HasForms, HasActions
{

    use InteractsWithForms;
    use InteractsWithActions;

    protected static string|BackedEnum|null $navigationIco = Heroicon::Cog6Tooth;

    protected static ?string $title = 'إعدادات مواقع التواصل الإجتماعي';

    protected string $view = 'filament.pages.manage-settings';

    protected static string|UnitEnum|null $navigationGroup = 'إدارة المستخدمين';

    protected static ?string $navigationLabel = 'إعدادات مواقع التواصل الإجتماعي';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::Cog6Tooth;

    protected static ?int $navigationSort = 7;


    public ?array $data = [];

    public function mount(): void
    {
        // Load settings from DB into the form data
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('حسابات التواصل الإجتماعي')
                    ->description(new \Illuminate\Support\HtmlString('إدارة روابط الحسابات الشخصية التي تظهر في الموقع.<br><span class="text-warning-600 font-bold">⚠️ ملاحظة: الحقول الفارغة لن تظهر أيقوناتها في صفحات الموقع.</span>'))
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('رابط حساب فيسبوك')
                            ->url()
                            ->placeholder('https://facebook.com/...'),

                        TextInput::make('twitter_url')
                            ->label('رابط حساب تويتر (X)')
                            ->url()
                            ->placeholder('https://twitter.com/...'),

                        TextInput::make('instagram_url')
                            ->label('رابط حساب انستغرام')
                            ->url()
                            ->placeholder('https://instagram.com/...'),

                        TextInput::make('linkedin_url')
                            ->label('رابط حساب لينكد إن')
                            ->url()
                            ->placeholder('https://linkedin.com/in/...'),

                        TextInput::make('dribbble_url')
                            ->label('رابط حساب دريبل')
                            ->url()
                            ->placeholder('https://dribbble.com/...'),

                        TextInput::make('whatsapp_number')
                            ->label('رقم الواتساب')
                            ->placeholder('مثال: 1234567890'),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('حفظ الإعدادات')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Invalidate the cache
        Cache::forget('global_settings');

        Notification::make()
            ->title('تم حفظ الإعدادات بنجاح!')
            ->success()
            ->send();
    }
}
