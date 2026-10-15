<?php

namespace App\Http\Controllers;

use App\Models\ExamAnswer;
use App\Models\ExamResult;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function exam(Subject $subject)
    {
        $questions = Question::where('subject_id', $subject->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit(150)
            ->get()
            ->map(function ($question) {
                $question->payload = json_decode($question->payload, true);
                return $question;
            });

        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Belum ada soal untuk mata pelajaran ini.');
        }

        return view('ujian.exam', compact('subject', 'questions'));
    }

    public function submit(Request $request, Subject $subject)
    {
        $student = Auth::guard('student')->user();
        $answers = $request->input('answers', []);

        $questions = Question::where('subject_id', $subject->id)->get();

        $correctCount = 0;
        $wrongCount = 0;

        $examResult = ExamResult::create([
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'exam_date' => now(),
            'total_score' => 0,
            'correct_count' => 0,
            'wrong_count' => 0,
        ]);

        foreach ($questions as $question) {
            $payload = json_decode($question->payload, true);
            $studentAnswer = $answers[$question->id] ?? null;
            $isCorrect = $studentAnswer === $payload['correct_answer'];

            if ($isCorrect) {
                $correctCount++;
            } else {
                $wrongCount++;
            }

            ExamAnswer::create([
                'exam_result_id' => $examResult->id,
                'question_id' => $question->id,
                'student_answer' => $studentAnswer,
                'correct_answer' => $payload['correct_answer'],
                'is_correct' => $isCorrect,
            ]);
        }

        $totalScore = ($correctCount / $questions->count()) * 100;

        $examResult->update([
            'total_score' => $totalScore,
            'correct_count' => $correctCount,
            'wrong_count' => $wrongCount,
        ]);

        return redirect()->route('ujian.histori', $examResult)
            ->with('success', 'Ujian selesai! Skor Anda: ' . number_format($totalScore, 2));
    }

    public function histori(ExamResult $examResult)
    {
        $examResult->load(['subject', 'answers.question']);

        // Decode payload untuk setiap jawaban
        foreach ($examResult->answers as $answer) {
            $answer->question->payload = json_decode($answer->question->payload, true);
        }

        return view('ujian.histori', compact('examResult'));
    }

    public function detail(ExamResult $examResult)
    {
        $examResult->load(['subject', 'answers.question']);

        // Decode payload untuk setiap jawaban
        foreach ($examResult->answers as $answer) {
            $answer->question->payload = json_decode($answer->question->payload, true);
        }

        return view('ujian.detail', compact('examResult'));
    }
}
