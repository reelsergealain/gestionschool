<?php

namespace App\Filament\Resources\OptionSubjectResource\Pages;

use App\Filament\Resources\OptionSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOptionSubject extends EditRecord
{
    protected static string $resource = OptionSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
