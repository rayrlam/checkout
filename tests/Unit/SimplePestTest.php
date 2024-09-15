<?php

use App\Models\User;

beforeEach(function () {
    $this->testUserEmail = 'peter@example.com';
});

test('can create a user', function () {
    $user = User::factory()->create([
        'name' => 'Peter Pan',
        'email' => $this->testUserEmail,
    ]);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->name)->toBe('Peter Pan')
        ->and($user->email)->toBe($this->testUserEmail);
});

test('can delete the created user', function () {
    $user = User::where('email', $this->testUserEmail)->first();
    
    expect($user)->not->toBeNull();

    $user->delete();

    $deletedUser = User::where('email', $this->testUserEmail)->first();
    
    expect($deletedUser)->toBeNull();
});