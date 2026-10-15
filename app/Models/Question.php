<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // relasi belongs to ke model Subject
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    // relasi has many ke model Answer
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    // Accessor untuk format soal yang rapi
    public function getFormattedQuestionAttribute(): string
    {
        $payload = json_decode($this->payload, true);

        if (!$payload) {
            return '<em class="text-gray-400">Tidak ada data soal</em>';
        }

        $html = '<div class="space-y-3">';
        $html .= '<p class="font-medium text-gray-900">' . htmlspecialchars($payload['question_text'] ?? '') . '</p>';
        $html .= '</div>';

        return $html;
    }

    // Accessor untuk format pilihan jawaban yang rapi
    public function getFormattedOptionsAttribute(): string
    {
        $payload = json_decode($this->payload, true);

        if (!$payload) {
            return '<em class="text-gray-400">Tidak ada pilihan jawaban</em>';
        }

        $html = '<div class="space-y-2">';
        $options = ['A', 'B', 'C', 'D'];

        foreach ($options as $option) {
            $isCorrect = ($payload['correct_answer'] ?? '') === $option;
            $class = $isCorrect ? 'text-green-600 font-semibold' : 'text-gray-600';
            $badge = $isCorrect ? ' <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs">Benar</span>' : '';

            $html .= '<div class="flex items-start gap-2 ' . $class . '">';
            $html .= '<span class="font-medium">' . $option . '.</span>';
            $html .= '<span>' . htmlspecialchars($payload['option_' . strtolower($option)] ?? '') . $badge . '</span>';
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }

    // Accessor untuk jawaban benar
    public function getCorrectAnswerAttribute(): string
    {
        $payload = json_decode($this->payload, true);

        return $payload['correct_answer'] ?? '-';
    }
}
