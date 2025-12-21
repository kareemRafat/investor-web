<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;

class IdeasRelationManager extends RelationManager
{
    protected static string $relationship = 'ideas';
    protected static ?string $title = 'الأفكار';


    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idea_field')
                    ->required(),
                Textarea::make('summary')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn($query) =>
                $query->with([
                    'user:id,name',
                    'countries:id,country,countryable_id,countryable_type',
                    'profits:id,idea_id,profit_type,range_id',
                    'costs:id,idea_id,cost_type,range_id',
                ])
            )
            ->recordTitleAttribute('idea_field')
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->state(
                        fn($rowLoop, $livewire) => ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1))
                            + $rowLoop->iteration
                    ),
                TextColumn::make('idea_field')
                    ->label('مجال الفكرة')
                    ->color('indigo')
                    ->weight('semibold')
                    ->formatStateUsing(fn($state) => __('idea.steps.step1.options.' . $state)),
                TextColumn::make('user.name')
                    ->label('صاحب الفكرة')
                    ->default('غير معروف')
                    ->weight('medium')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable(),
                TextColumn::make('profit_type')
                    ->label('الأرباح')
                    ->badge()
                    ->getStateUsing(
                        fn($record) =>
                        optional($record->profits->first())->profit_type
                    )
                    ->colors([
                        'success' => 'annual',
                        'info' => 'one-time',
                    ])
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'annual' ? 'سنوية' : 'مرة واحدة'
                    ),
                TextColumn::make('cost_type')
                    ->label('التكاليف')
                    ->badge()
                    ->getStateUsing(
                        fn($record) =>
                        optional($record->costs->first())->cost_type
                    )
                    ->colors([
                        'danger' => 'annual',
                        'warning' => 'one-time',
                    ])
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'annual' ? 'سنوية' : 'مرة واحدة'
                    ),
                TextColumn::make('countries.country')
                    ->label('الدول')
                    ->badge()
                    ->color('indigo')
                    ->getStateUsing(function ($record) {
                        $options = __('idea.steps.step2.options');
                        return $record->countries->map(function ($country) use ($options) {
                            $found = collect($options)->firstWhere('code', $country->country);
                            $name = $found['name'] ?? $country->country;
                            return $name;
                        })->toArray();
                    })
                    ->wrap()
                    ->width('250px')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                // EditAction::make(),
                // DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
