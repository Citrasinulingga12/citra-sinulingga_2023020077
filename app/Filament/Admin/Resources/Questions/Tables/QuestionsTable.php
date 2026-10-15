<?php

namespace App\Filament\Admin\Resources\Questions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class QuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('no')
                    ->rowIndex()
                    ->width(40),
                TextColumn::make('subject.name')
                    ->searchable()
                    ->label('Mata Pelajaran'),
                TextColumn::make('question_text')
                    ->label('Soal')
                    ->state(function ($record) {
                        $payload = json_decode($record->payload, true);
                        return $payload['question_text'] ?? 'Tidak ada soal';
                    })
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('score')
                    ->numeric()
                    ->label('Bobot')
                    ->suffix(' poin')
                    ->sortable(),
                TextColumn::make('correct_answer')
                    ->label('Jawaban Benar')
                    ->badge()
                    ->color('success'),

                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('subject')
                    ->label('Mata Pelajaran')
                    ->relationship('subject', 'name')
                    ->multiple()
                    ->native(false),
                TernaryFilter::make('is_active')
                    ->label('Status Soal')
                    ->trueLabel('Tersedia untuk di ujian kan')
                    ->falseLabel('Tidak untuk di ujian kan')
                    ->placeholder('pilih salah satu')
                    ->native(false),

            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
