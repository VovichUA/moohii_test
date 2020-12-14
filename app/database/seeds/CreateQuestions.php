<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateQuestions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'Как много пирожков вам надо?',
            'Выберете начинки для пирожков',
            'На когда вам приготовить?',
            'Адресс',
            'Есть ли аллергия на глютен?',
            'Укажите свои контакты',
        ];

        $subQuestions = [
            'Email',
            'WhatsApp messages',
            'WhatsApp call',
            'Phone call',
            'Other'
        ];

        foreach ($questions as $question) {
            $id = DB::table('questions')->insertGetId([
                'question' => $question
            ]);
        }

        foreach ($subQuestions as $subQuestion) {
            DB::table('questions')->insert([
                'parent_id' => $id,
                'question' => $subQuestion
            ]);
        }

    }
}
