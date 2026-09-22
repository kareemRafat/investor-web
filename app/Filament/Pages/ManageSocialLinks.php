<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use App\Support\SocialLinks;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageSocialLinks extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShare;

    protected static string|UnitEnum|null $navigationGroup = 'إدارة التواصل';

    protected static ?string $navigationLabel = 'روابط التواصل الاجتماعي';

    protected static ?string $title = 'روابط التواصل الاجتماعي';

    protected static ?int $navigationSort = 101;

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $data = [];

        foreach (SocialLinks::networks() as $key => $network) {
            $data["social_{$key}"] = SiteSetting::get(SocialLinks::settingKey($key));
        }

        $this->form->fill($data);
    }

    public function defaultForm(Schema $schema): Schema
    {
        $components = [];

        foreach (SocialLinks::networks() as $key => $network) {
            $components[] = TextInput::make("social_{$key}")
                ->label($network['label'])
                ->placeholder('https://...')
                ->url()
                ->nullable()
                ->maxLength(255)
                ->helperText('اترك الحقل فارغًا لإخفاء الأيقونة من الموقع.');
        }

        return $schema
            ->components($components)
            ->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema;
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    EmbeddedSchema::make('form'),
                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('حفظ')
                ->action(fn () => $this->save()),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach (SocialLinks::networks() as $key => $network) {
            SiteSetting::set(SocialLinks::settingKey($key), $data["social_{$key}"] ?? null);
        }

        Notification::make()
            ->success()
            ->title('تم حفظ روابط التواصل الاجتماعي بنجاح.')
            ->send();
    }

    public static function canAccess(): bool
    {
        return true;
    }
}
