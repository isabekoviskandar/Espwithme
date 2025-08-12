<?php

namespace App\Filament\Resources;

use App\Domain\VideoLesson\Model\VideoLesson;
use App\Filament\Resources\VideoLessonResource\Pages;
use App\Filament\Resources\VideoLessonResource\RelationManagers;
use Filament\Forms;
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

class VideoLessonResource extends Resource
{
    protected static ?string $model = VideoLesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->relationship('category' , 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title'),
                Textarea::make('description'),
                TextInput::make('source_video'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category'),
                TextColumn::make('title'),
                Textarea::make('description'),
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
            'index' => Pages\ListVideoLessons::route('/'),
            'create' => Pages\CreateVideoLesson::route('/create'),
            'edit' => Pages\EditVideoLesson::route('/{record}/edit'),
        ];
    }
}
