<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question};

class LikeController extends Controller
{
    public function __invoke(Question $question)
    {
        user()->like($question);

        return back();
    }
}
