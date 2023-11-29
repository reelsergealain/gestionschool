<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;
use AbanoubNassem\FilamentPhoneField\Forms\Components\PhoneInput;
use Filament\Tables\Filters\SelectFilter;

class StudentResource extends Resource
{

    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Étudiants';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Card::make()
                // ->schema([
                TextInput::make('student_id')->label("Matricule"),
                TextInput::make('first_name')->label("Nom"),
                TextInput::make('last_name')->label("Prénom"),
                TextInput::make('birth_date')->label("Date de naissance")->placeholder('01/02/2020'),
                TextInput::make('email')->label("Email")->prefixIcon('heroicon-m-inbox-arrow-down'),
                PhoneInput::make('phone')->label("Telephone")->tel()->placeholder("0711113420"),
                Select::make('gender')
                ->options([
                    'M' => 'Homme',
                    'F' => 'Femme',
                ])->native(false)->placeholder('Sexe'),
                Select::make('level_id')->relationship(name: 'level', titleAttribute: 'name'),
                Select::make('option_id')->relationship(name: 'option', titleAttribute: 'name'),
                Select::make('school_year_id')->relationship(name: 'schoolYear', titleAttribute: 'name'),
                Toggle::make('bource')->label('Bourssier'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student_id')->label('Matricule')->searchable(),
                TextColumn::make('first_name')->label('Nom')->searchable()->sortable(),
                TextColumn::make('last_name')->label('Prénom')->searchable(),
                TextColumn::make('email')->label('Adresse Email')->searchable(),
                TextColumn::make('option.name')->label('Filiere'),
                TextColumn::make('level.name')->label('Niveau académique'),
                TextColumn::make('phone')->label('Telephone'),
                TextColumn::make('bourse')->label('Bource'),
            ])
            ->filters([
                SelectFilter::make('student')->relationship('level', 'name'),
                SelectFilter::make('student')->relationship('option', 'name'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
