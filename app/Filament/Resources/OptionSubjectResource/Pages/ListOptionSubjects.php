<?php

namespace App\Filament\Resources\OptionSubjectResource\Pages;

use App\Filament\Resources\OptionSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOptionSubjects extends ListRecords
{
    protected static string $resource = OptionSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
