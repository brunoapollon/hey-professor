<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

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

it('should check if ends with question mark ?', function () {
    expect(true)->toBeTrue();
});

it('should have at least 10 charactres', function () {
    $user = User::factory()->create();
    actingAs(($user));

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ]);

    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min'=>  10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);
});
