<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DatacenterResource\Pages;
use App\Filament\Resources\DatacenterResource\RelationManagers;
use App\Models\Datacenter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatacenterResource extends Resource
{
    protected static ?string $model = Datacenter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->placeholder('Name'),
                Forms\Components\TextInput::make('location')
                    ->label('Location')
                    ->required()
                    ->placeholder('Location'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListDatacenters::route('/'),
            'create' => Pages\CreateDatacenter::route('/create'),
            'edit' => Pages\EditDatacenter::route('/{record}/edit'),
        ];
    }
}
