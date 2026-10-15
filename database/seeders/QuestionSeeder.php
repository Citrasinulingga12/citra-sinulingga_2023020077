<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $subjects = [
            'Matematika' => [
                'questions' => [
                    ['question_text' => 'Berapa hasil dari 5 + 3?', 'option_a' => '6', 'option_b' => '7', 'option_c' => '8', 'option_d' => '9', 'correct_answer' => 'C'],
                    ['question_text' => 'Berapa hasil dari 10 - 4?', 'option_a' => '5', 'option_b' => '6', 'option_c' => '7', 'option_d' => '8', 'correct_answer' => 'B'],
                    ['question_text' => 'Berapa hasil dari 6 × 7?', 'option_a' => '36', 'option_b' => '42', 'option_c' => '48', 'option_d' => '54', 'correct_answer' => 'B'],
                    ['question_text' => 'Berapa hasil dari 100 ÷ 4?', 'option_a' => '20', 'option_b' => '25', 'option_c' => '30', 'option_d' => '35', 'correct_answer' => 'B'],
                    ['question_text' => 'Berapa akar kuadrat dari 144?', 'option_a' => '10', 'option_b' => '11', 'option_c' => '12', 'option_d' => '13', 'correct_answer' => 'C'],
                ],
            ],
            'Bahasa Indonesia' => [
                'questions' => [
                    ['question_text' => 'Apa sinonim dari kata "besar"?', 'option_a' => 'Kecil', 'option_b' => 'Luas', 'option_c' => 'Tinggi', 'option_d' => 'Panjang', 'correct_answer' => 'B'],
                    ['question_text' => 'Apa antonim dari kata "tinggi"?', 'option_a' => 'Besar', 'option_b' => 'Luas', 'option_c' => 'Rendah', 'option_d' => 'Panjang', 'correct_answer' => 'C'],
                    ['question_text' => 'Manakah yang termasuk kata benda?', 'option_a' => 'Lari', 'option_b' => 'Buku', 'option_c' => 'Cantik', 'option_d' => 'Cepat', 'correct_answer' => 'B'],
                    ['question_text' => 'Apa fungsi dari tanda titik (.)?', 'option_a' => 'Menanyakan', 'option_b' => 'Menghentikan kalimat', 'option_c' => 'Mengungkapkan rasa', 'option_d' => 'Memisahkan kata', 'correct_answer' => 'B'],
                    ['question_text' => 'Manakah yang termasuk kalimat majemuk?', 'option_a' => 'Saya belajar', 'option_b' => 'Saya belajar dan bermain', 'option_c' => 'Belajar', 'option_d' => 'Bermain', 'correct_answer' => 'B'],
                ],
            ],
            'Bahasa Inggris' => [
                'questions' => [
                    ['question_text' => 'What is the meaning of "apple"?', 'option_a' => 'Jeruk', 'option_b' => 'Apel', 'option_c' => 'Mangga', 'option_d' => 'Pisang', 'correct_answer' => 'B'],
                    ['question_text' => 'Choose the correct sentence:', 'option_a' => 'She go to school', 'option_b' => 'She goes to school', 'option_c' => 'She going to school', 'option_d' => 'She gone to school', 'correct_answer' => 'B'],
                    ['question_text' => 'What is the opposite of "hot"?', 'option_a' => 'Warm', 'option_b' => 'Cold', 'option_c' => 'Cool', 'option_d' => 'Freezing', 'correct_answer' => 'B'],
                    ['question_text' => 'How do you say "Selamat pagi" in English?', 'option_a' => 'Good night', 'option_b' => 'Good afternoon', 'option_c' => 'Good morning', 'option_d' => 'Good evening', 'correct_answer' => 'C'],
                    ['question_text' => 'What is the plural of "child"?', 'option_a' => 'Childs', 'option_b' => 'Children', 'option_c' => 'Childrens', 'option_d' => 'Childes', 'correct_answer' => 'B'],
                ],
            ],
            'IPA' => [
                'questions' => [
                    ['question_text' => 'Apa fungsi dari jantung?', 'option_a' => 'Mencerna makanan', 'option_b' => 'Memompa darah', 'option_c' => 'Bernapas', 'option_d' => 'Berpikir', 'correct_answer' => 'B'],
                    ['question_text' => 'Berapa jumlah kaki pada serangga?', 'option_a' => '4', 'option_b' => '6', 'option_c' => '8', 'option_d' => '10', 'correct_answer' => 'B'],
                    ['question_text' => 'Apa proses pembuatan makanan pada tumbuhan?', 'option_a' => 'Respirasi', 'option_b' => 'Fotosintesis', 'option_c' => 'Transpirasi', 'option_d' => 'Evaporasi', 'correct_answer' => 'B'],
                    ['question_text' => 'Gas yang diperlukan untuk bernapas adalah?', 'option_a' => 'Karbon dioksida', 'option_b' => 'Nitrogen', 'option_c' => 'Oksigen', 'option_d' => 'Hidrogen', 'correct_answer' => 'C'],
                    ['question_text' => 'Apa nama lapisan terluar bumi?', 'option_a' => 'Mantel', 'option_b' => 'Inti', 'option_c' => 'Kerak', 'option_d' => 'Atmosfer', 'correct_answer' => 'C'],
                ],
            ],
            'IPS' => [
                'questions' => [
                    ['question_text' => 'Apa ibu kota Indonesia?', 'option_a' => 'Jakarta', 'option_b' => 'Surabaya', 'option_c' => 'Bandung', 'option_d' => 'Medan', 'correct_answer' => 'A'],
                    ['question_text' => 'Berapa jumlah provinsi di Indonesia?', 'option_a' => '34', 'option_b' => '35', 'option_c' => '36', 'option_d' => '37', 'correct_answer' => 'A'],
                    ['question_text' => 'Apa nama benua tempat Indonesia berada?', 'option_a' => 'Asia', 'option_b' => 'Afrika', 'option_c' => 'Eropa', 'option_d' => 'Amerika', 'correct_answer' => 'A'],
                    ['question_text' => 'Apa mata uang negara Jepang?', 'option_a' => 'Won', 'option_b' => 'Yen', 'option_c' => 'Yuan', 'option_d' => 'Ringgit', 'correct_answer' => 'B'],
                    ['question_text' => 'Siapa presiden pertama Indonesia?', 'option_a' => 'Soeharto', 'option_b' => 'Sukarno', 'option_c' => 'Habibie', 'option_d' => 'Gus Dur', 'correct_answer' => 'B'],
                ],
            ],
        ];

        foreach ($subjects as $subjectName => $data) {
            $subject = Subject::firstOrCreate(['name' => $subjectName]);

            // Buat 150 soal per mata pelajaran (ulangi pola soal)
            for ($i = 0; $i < 150; $i++) {
                $questionData = $data['questions'][$i % count($data['questions'])];

                Question::create([
                    'subject_id' => $subject->id,
                    'score' => 1,
                    'payload' => json_encode([
                        'question_text' => $questionData['question_text'] . ' (Soal ' . ($i + 1) . ')',
                        'option_a' => $questionData['option_a'],
                        'option_b' => $questionData['option_b'],
                        'option_c' => $questionData['option_c'],
                        'option_d' => $questionData['option_d'],
                        'correct_answer' => $questionData['correct_answer'],
                    ]),
                    'is_active' => true,
                ]);
            }
        }
    }
}
