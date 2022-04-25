<?php

use App\Models\Collective;

test('dashboard hidden for guests', function () {
    $response = $this->get('/fanatic');
    $response->assertRedirect('/fanatic/login');
});

test('logs in', function () {
	$user = Collective::first();
    $response = $this->actingAs($user)->get('/fanatic');
    $response->assertViewIs('admin.dashboard');
});
