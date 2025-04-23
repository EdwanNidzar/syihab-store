<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricesListResource\Pages;
use App\Filament\Resources\PricesListResource\RelationManagers;
use App\Models\PricesList;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PricesListResource extends Resource
{
    protected static ?string $model = PricesList::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Prices List';
    protected static ?string $slug = 'prices-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('list')
                    ->required()
                    ->label('List')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state))),
                
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\Repeater::make('picture')
                    ->label('Pictures')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('prices-list-pictures')
                            ->preserveFilenames()
                            ->required(),
                    ])
                    ->reorderable()
                    ->collapsible()
                    ->minItems(1)
                    ->addActionLabel('Tambah Gambar')
                    ->columns(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('list')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPricesLists::route('/'),
            'create' => Pages\CreatePricesList::route('/create'),
            'edit' => Pages\EditPricesList::route('/{record}/edit'),
        ];
    }
}
