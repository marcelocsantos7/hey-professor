<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;


it('should be able to create a new question bigger than 255 characters', function () {
    // Arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);

    // Act :: agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // Assert :: verificar
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);
});

it('should check if ends with question mark', function () {

})->todo();

it('should have at leat 10 characters', function () {

})->todo();
