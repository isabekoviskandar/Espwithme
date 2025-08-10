<?php

namespace App\Filament\Resources;

use App\Domain\Book\Model\Book;
use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('genre_id')
                    ->relationship('genre', 'name') // 'name' is the column to display
                    ->searchable() // optional: allows search
                    ->preload()    // optional: loads all options immediately
                    ->required(),

                TextInput::make('title'),
                TextInput::make('author'),
                Textarea::make('description'),
                FileUpload::make('file'),
                FileUpload::make('image')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('genre.name')
                    ->label('Genre')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('author')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->limit(50), // show only first 50 chars

                // Display file download link
                TextColumn::make('file')
                    ->label('File')
                    ->formatStateUsing(fn($state) => $state ? 'Download' : '—')
                    ->url(fn($record) => $record->file ? asset('storage/' . $record->file) : null, true)
                    ->openUrlInNewTab(),

                // Display image thumbnail
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->square()
                    ->size(50),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
