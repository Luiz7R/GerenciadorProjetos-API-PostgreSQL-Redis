<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TarefasResource\Pages;
use App\Filament\Resources\TarefasResource\RelationManagers;
use App\Models\Tarefa;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Http\Controllers\TarefasController;

class TarefasResource extends Resource
{
    protected static ?string $model = Tarefa::class;

    protected $controller;

    public function __construct(TarefasController $controller)
    {
        $this->controller = $controller;
    }

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_usuario')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('id_projeto')
                    ->relationship('projeto', 'nome')
                    ->required(),

                Forms\Components\Select::make('id_status')
                    ->relationship('status', 'nome')
                    ->required(),

                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(70),

                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(150),

                Forms\Components\Select::make('prioridade')
                ->options([
                    'Baixa' => 'Baixa',
                    'Media' => 'Media',
                    'Urgente' => 'Urgente',
                ]),

                Forms\Components\DatePicker::make('data_conclusao')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_usuario'),
                Tables\Columns\TextColumn::make('id_projeto'),
                Tables\Columns\TextColumn::make('status.nome'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('titulo'),
                Tables\Columns\TextColumn::make('descricao'),
                Tables\Columns\TextColumn::make('prioridade'),
                Tables\Columns\TextColumn::make('data_conclusao')
                    ->date(),
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
            'index' => Pages\ListTarefas::route('/'),
            'create' => Pages\CreateTarefas::route('/create'),
            'edit' => Pages\EditTarefas::route('/{record}/edit'),
        ];
    }   
}
