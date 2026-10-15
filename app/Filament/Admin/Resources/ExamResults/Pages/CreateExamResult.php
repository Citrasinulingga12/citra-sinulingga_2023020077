<?php

namespace App\Filament\Admin\Resources\ExamResults\Pages;

use App\Filament\Admin\Resources\ExamResults\ExamResultResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExamResult extends CreateRecord
{
    protected static string $resource = ExamResultResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
