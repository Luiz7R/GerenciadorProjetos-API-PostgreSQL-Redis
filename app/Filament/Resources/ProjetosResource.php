<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjetosResource\Pages;
use App\Filament\Resources\ProjetosResource\RelationManagers;
use App\Models\Projetos;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Hidden;

class ProjetosResource extends Resource
{
    protected static ?string $model = Projetos::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('id_status')
                    ->relationship('status', 'nome')
                    ->required(),

                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(70),

                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(150),

                Forms\Components\DatePicker::make('data_entrega')
                    ->required(),

                Forms\Components\Select::make('ativo')
                    ->options([
                        '0' => 'Desativado',
                        '1' => 'Ativo'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),

                Tables\Columns\TextColumn::make('status.nome'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/y h:i'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/y h:i'),

                Tables\Columns\TextColumn::make('nome'),

                Tables\Columns\TextColumn::make('descricao'),

                Tables\Columns\TextColumn::make('data_entrega')
                    ->date(),

                Tables\Columns\TextColumn::make('ativo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProjetos::route('/'),
            'create' => Pages\CreateProjetos::route('/create'),
            'edit' => Pages\EditProjetos::route('/{record}/edit'),
        ];
    }    
}
