<?php

namespace App\Filament\Resources\StudentResource\Widgets;

use App\Models\Level;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentStatsOverview extends BaseWidget
{

    protected function getStats(): array
    {
        $infirmier = Student::whereHas('option', function ($query) {
            $query->where('name', 'INFIRMIER');
        })->count();
        $infirmiere = Student::whereHas('option', function ($query) {
            $query->where('name', 'INFIRMIERE');
        })->count();
        $idetotals = $infirmier + $infirmiere;

        $SF = Student::whereHas('option', function ($query) {
            $query->where('name', 'SAGE-FEMME');
        })->count();

        return [
            Stat::make('Etudients', Student::all()->count()),
            Stat::make('INFIRMIER/INFIRMIERE', $idetotals),
            Stat::make('SAGE-FEMME', $SF),
        ];
    }
}
