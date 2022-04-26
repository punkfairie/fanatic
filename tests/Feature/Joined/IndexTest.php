<?php

use App\Models\Collective;

it('gets joined index', function () {
    $response = $this->actingAs(Collective::first())->get('/fanatic/joined');
    $response->assertViewIs('admin.joined.index');
});

it('does not show index to guests', function () {
    $response = $this->get('/fanatic/joined');
    $response->assertRedirect('/fanatic/login');
});