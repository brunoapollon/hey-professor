<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Closure;

class QuestionController extends Controller
{
    public function store():RedirectResponse {
        Question::query()->create(
            request()->validate([
                "question"=> [
                    "required", 
                    "min:10",
                    function (string $attribute, mixed $value, Closure $fail) {
                        if ($value[strlen($value) - 1] !== "?") {
                            $fail('Are you sure that is a question? It is mssing a question mark in the end.');
                        }
                    }
                ],
            ])
        );    

        return to_route('dashboard');
    }
}
