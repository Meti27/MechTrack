<?php

use App\Models\User;

it('allows logged-in users to access admin dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/dashboard')
        ->assertStatus(200)
        ->assertSee('Admin Dashboard');
});
