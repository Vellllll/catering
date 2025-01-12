<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuChoiceResource\Pages;
use App\Filament\Resources\MenuChoiceResource\RelationManagers;
use App\Models\MenuChoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class MenuChoiceResource extends Resource
{
    protected static ?string $model = MenuChoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(40),
                Select::make('menu_id')
                    ->relationship(name: 'menu', titleAttribute: 'name')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('menu.name')
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
            'index' => Pages\ListMenuChoices::route('/'),
            'create' => Pages\CreateMenuChoice::route('/create'),
            'edit' => Pages\EditMenuChoice::route('/{record}/edit'),
        ];
    }
}
