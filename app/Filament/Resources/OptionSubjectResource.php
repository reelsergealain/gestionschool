<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OptionSubjectResource\Pages;
use App\Filament\Resources\OptionSubjectResource\RelationManagers;
use App\Models\OptionSubject;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OptionSubjectResource extends Resource
{
    protected static ?string $model = OptionSubject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subject_id')->relationship('subject', titleAttribute: 'name')->placeholder('Sélectionnez une matière'),
                TextInput::make('order')->minValue(0)->placeholder('0'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOptionSubjects::route('/'),
            'create' => Pages\CreateOptionSubject::route('/create'),
            'edit' => Pages\EditOptionSubject::route('/{record}/edit'),
        ];
    }
}
