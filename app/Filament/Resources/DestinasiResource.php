<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinasiResource\Pages;
use App\Filament\Resources\DestinasiResource\RelationManagers;
use App\Models\Destinasi; 
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DestinasiResource extends Resource
{
    protected static ?string $model = Destinasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'Semua Destinasi';
    protected static ?string $navigationGroup = 'Kelola Destinasi';
    protected static ?string $slug = 'Destinasi';
    public static ?string $label = 'Kelola Destinasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama destinasi') 
                    ->label('Nama Destinasi')
                    ->required()
                    ->placeholder('Masukkan nama destinasi'),
                TextInput::make('detail')
                    ->label('Detail')
                    ->required()
                    ->placeholder('Masukkan detail destinasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama destinasi')
                    ->label('Nama Destinasi')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('detail')
                    ->label('Detail')
                    ->searchable(),
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
            'index' => Pages\ListDestinasis::route('/'),
            'create' => Pages\CreateDestinasi::route('/create'),
            'edit' => Pages\EditDestinasi::route('/{record}/edit'),
        ];
    }
}
