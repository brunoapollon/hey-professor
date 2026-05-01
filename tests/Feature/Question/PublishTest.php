<?php

use App\Models\{Question, User};

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{actingAs, put};

uses(RefreshDatabase::class);

it("should be able to publish a question", function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create(["draft" => true]);

    actingAs($user);

    put(route('question.publish', $question))->assertRedirect();

    $question->refresh();


    expect($question)->draft->toBeFalse();
});
