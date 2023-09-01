<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientInventoryResource\Pages;
use App\Filament\Resources\ClientInventoryResource\RelationManagers;
use App\Models\ClientInventory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class ClientInventoryResource extends Resource
{
    protected static ?string $model = ClientInventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Equipamentos';

    protected static ?string $navigationGroup = 'Ativos';

    protected static ?string $slug = 'Equipamentos';

    protected static ?string $modelLabel = 'equipamento';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Select::make('user_id')               
                ->label('Técnico Responsavel')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Select::make('client_id')
                ->label('Cliente')
                ->relationship('client', 'client_name')
                ->required(),
            Forms\Components\TextInput::make('computer_name')
                ->label('Nome Dispositivo')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_acount')
                ->label('Usuario')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_password')
                ->label('Senha do Usuario')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_anydesk')
                ->label('Anydesk')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_anydesk_password')
                ->label('Senha Anydesk')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('computer_description')
                ->label('Descrição')
                ->rows(2)
                ->cols(4)
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_location')
                ->label('Localização')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('computer_sector')
                ->label('Setor')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('client.client_name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('computer_name')
                    ->label('Nome Dispositivo')
                    ->limit(20),
                Tables\Columns\TextColumn::make('computer_acount')
                    ->label('Usuario'),
                Tables\Columns\TextColumn::make('computer_password')
                    ->label('Senha do Usuario'),
                Tables\Columns\TextColumn::make('computer_anydesk')
                    ->label('Anydesk'),
                Tables\Columns\TextColumn::make('computer_anydesk_password')
                    ->label('Senha Anydesk'),
                Tables\Columns\TextColumn::make('computer_description')
                    ->label('Descrição')
                    ->limit(10),
                Tables\Columns\TextColumn::make('computer_location')
                    ->label('Localização'),
                Tables\Columns\TextColumn::make('computer_sector')
                    ->label('Setor'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClientInventories::route('/'),
        ];
    }    
}
