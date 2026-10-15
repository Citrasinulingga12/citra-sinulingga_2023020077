<?php

namespace App\Filament\Admin\Resources\Questions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class QuestionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(4)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('subject.name')
                            ->columnSpan(2)
                            ->label('Mata Pelajaran')
                            ->placeholder('-'),
                        TextEntry::make('score')
                            ->numeric()
                            ->label('Bobot Nilai ')
                            ->suffix(' poin'),
                        IconEntry::make('is_active')
                            ->boolean()
                            ->label('Tersedia untuk ujian'),
                        TextEntry::make('formatted_question')
                            ->label('Soal')
                            ->html()
                            ->size(TextSize::Medium)
                            ->columnSpanFull(),
                        TextEntry::make('formatted_options')
                            ->label('Pilihan Jawaban')
                            ->html()
                            ->columnSpanFull(),
                        TextEntry::make('correct_answer')
                            ->label('Jawaban Benar')
                            ->badge()
                            ->color('success')
                            ->size(TextSize::Medium)
                            ->columnSpanFull(),
                    ])
            ]);
    }
}
