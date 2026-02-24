<?php

namespace App\Filament\Resources\Ideas\Pages;

use App\Filament\Actions\IdeaAction\ChangeIdeaStatusAction;
use App\Filament\Resources\Ideas\IdeaResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

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

            ChangeIdeaStatusAction::make(),

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
