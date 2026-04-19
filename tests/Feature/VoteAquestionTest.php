<?php

use App\Models\{Question, User};
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

uses(RefreshDatabase::class);

it("should be able to like a question ", function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question));

    assertDatabaseHas('votes', [
        'user_id'     => $user->id,
        'question_id' => $question->id,
        'like'        => 1,
        'unlike'      => 0,

    ]);
});
