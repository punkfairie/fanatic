<?php

use App\Models\Collective;
use function Pest\Faker\faker;

uses()->group('owned', 'admin');

beforeEach(function () {
    $this->user = Collective::first();
    $this->request = [
        'categories' => [rand(1, 57), rand(1, 57), rand(1, 57)],
        'url'        => faker()->url,
        'subject'    => faker()->word,
        'approved'   => faker()->boolean,
    ];
});

it('has owned create page', function () {
    $response = $this->actingAs($this->user)->get('/fanatic/owned/create');

    $response->assertViewIs('admin.owned.create');
});

it('hides owned create page from guests', function () {
    $response = $this->get('/fanatic/owned/create');

    $response->assertRedirect('/fanatic/login');
});
