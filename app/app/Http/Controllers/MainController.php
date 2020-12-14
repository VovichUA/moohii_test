<?php


namespace App\Http\Controllers;

use App\Question;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController
{
    public function index()
    {
        $questions = Question::all();

        $data = [
            'questions' => $questions
        ];

        return view('form');
    }
}
