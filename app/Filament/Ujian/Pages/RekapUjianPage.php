<?php

namespace App\Filament\Ujian\Pages;

use App\Models\ExamResult;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\Auth;

class RekapUjianPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $view = 'filament.ujian.pages.rekap-ujian-page';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Rekap Ujian';

    protected static ?string $title = 'Rekap Ujian Saya';

    public function table(Table $table): Table
    {
        $student = Auth::guard('student')->user();

        return $table
            ->query(ExamResult::query()->where('student_id', $student->id))
            ->columns([
                TextColumn::make('subject.name')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('exam_date')
                    ->label('Tanggal Ujian')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('total_score')
                    ->label('Skor')
                    ->sortable(),

                TextColumn::make('correct_count')
                    ->label('Benar')
                    ->sortable(),

                TextColumn::make('wrong_count')
                    ->label('Salah')
                    ->sortable(),
            ])
            ->actions([
                \Filament\Tables\Actions\Action::make('detail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (ExamResult $record): string => route('ujian.histori', $record)),
            ])
            ->bulkActions([
                //
            ]);
    }
}
