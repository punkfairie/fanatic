<?php

use App\Models\Collective;

uses()->group('owned', 'admin');

it('has index page', function () {
    $response = $this->actingAs(Collective::first())->get('/fanatic/owned');

    $response->assertViewIs('admin.owned.index');
});

it('hides index from guests', function () {
    $response = $this->get('/fanatic/owned');

    $response->assertRedirect('/fanatic/login');
});
