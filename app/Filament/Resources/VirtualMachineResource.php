<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VirtualMachineResource\Pages;
use App\Filament\Resources\VirtualMachineResource\RelationManagers;
use App\Models\Client;
use App\Models\Datacenter;
use App\Models\Node;
use App\Models\VirtualMachine;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class VirtualMachineResource extends Resource
{
    protected static ?string $model = VirtualMachine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Select::make('client_id')
                    ->label('Client')
                    ->required()
                    ->options(
                        Client::all()->pluck('name', 'id')
                    ),
                Select::make('datacenter_id')
                    ->live()
                    ->label('Datacenter')
                    ->required()
                    ->dehydrated(false)
                    ->options(
                        Datacenter::all()->pluck('name', 'id')
                    ),
                Select::make('node_id')
                    ->label('Node')
                    ->required()
                    ->placeholder(fn(Forms\Get $get): string => empty($get('country_id')) ? 'First select datacenter' : 'Select an option')
                    ->options(function (Forms\Get $get): Collection {
                        return Node::where('datacenter_id', $get('datacenter_id'))->pluck('name', 'id');
                    }),
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
            'index' => Pages\ListVirtualMachines::route('/'),
            'create' => Pages\CreateVirtualMachine::route('/create'),
            'edit' => Pages\EditVirtualMachine::route('/{record}/edit'),
        ];
    }
}
