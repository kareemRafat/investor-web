<?php

namespace App\Filament\Resources\Investors\Pages;

use App\Filament\Actions\InvestorAction\ChangeInvestorStatusAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Investors\InvestorResource;

class ViewInvestor extends ViewRecord
{
    protected static string $resource = InvestorResource::class;

    protected string $view = 'filament.pages.investor.view-investor';

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
                ->color('gray'),

            ChangeInvestorStatusAction::make(),

        ];
    }

    protected function getRecordQuery()
    {
        return parent::getRecordQuery()
            ->with([
                'user:id,name,email,phone',
                'approver:id,name',
                'countries',
                'resources:id,investor_id,company,space_type,staff,staff_number,workers,workers_number,executive_spaces,executive_spaces_type,equipment,equipment_type,software,software_type,website',
                'contributions' => function ($query) {
                    $query->select(
                        'id',
                        'investor_id',
                        'contribute_type',
                        'staff',
                        'staff_person_money',
                        'money_amount',
                        'money_percent',
                        'person_money_amount',
                        'person_money_percent',
                        'money_contributions'
                    )->with('contributionRange:id,type,min_value,max_value,label_en,label_ar');
                },
                'attachments:id,attachable_id,attachable_type,original_name,path',
            ]);
    }
}
