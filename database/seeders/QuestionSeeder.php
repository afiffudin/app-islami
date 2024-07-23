<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            ['question' => 'Ayat manakah yang berbunyi "Bismillahirrahmanirrahim"?', 'answer' => 'Al-Fatihah 1'],
            ['question' => 'Ayat manakah yang berbunyi "Alhamdulillahirabbilalamin"?', 'answer' => 'Al-Fatihah 2'],
        ];
        foreach ($questions as $questions) {
            Question::create($questions);
        }
    }
}
