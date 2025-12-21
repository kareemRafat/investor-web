<?php

namespace App\Filament\Resources\Ideas\Pages;

use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Ideas\IdeaResource;

class ViewIdea extends ViewRecord
{
    protected static string $resource = IdeaResource::class;

    protected string $view = 'filament.pages.idea.view-idea';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('العودة إلى القائمة')
                ->icon('heroicon-o-arrow-left')
                ->url(function () {
                    $resource = static::getResource();
                    return $resource::getUrl('index');
                })
                ->color('gray'), // EditAction::make(),

        ];
    }

    protected function getRecordQuery()
    {
        return parent::getRecordQuery()
            ->with([
                'user:id,name,email',
                'countries:id,country,countryable_id,countryable_type',
                'profits:id,idea_id,profit_type,range_id',
                'costs:id,idea_id,cost_type,range_id',
                'resources',
                'expenses',
                'contributions',
                'returns',
                'attachments',
            ]);
    }
}
