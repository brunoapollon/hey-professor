<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

uses(RefreshDatabase::class);

test('should be able to create.a new question bigger than 255 characters', function () {
    $user = User::factory()->create();
    actingAs(($user));

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);

});

it('should create as a draft all the time', function () {
    $user = User::factory()->create();
    actingAs(($user));

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?',
        'draft'    => true,
    ]);
});

it('should check if ends with question mark ?', function () {
    $user = User::factory()->create();
    actingAs(($user));

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 10),
    ]);

    $request->assertSessionHasErrors([
        'question' => 'Are you sure that is a question? It is mssing a question mark in the end.',
    ]);
    assertDatabaseCount('questions', 0);
});

it('should have at least 10 charactres', function () {
    $user = User::factory()->create();
    actingAs(($user));

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ]);

    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);
});
