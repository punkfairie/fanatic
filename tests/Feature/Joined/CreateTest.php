<?php

use App\Models\Category;
use App\Models\Collective;
use function Pest\Faker\faker;

beforeEach(function () {
    $this->user = Collective::first();
    $this->request = [
        'categories' => [rand(1,57), rand(1,57), rand(1,57)],
        'url'        => faker()->url,
        'subject'    => faker()->word,
        'approved'   => faker()->boolean,
    ];
});

it('gets joined create', function () {
    $response = $this->actingAs($this->user)->get('fanatic/joined/create');
    $response->assertViewIs('admin.joined.create');
});

it('does not show create to guests', function () {
    $response = $this->get('/fanatic/joined/create');
    $response->assertRedirect('/fanatic/login');
});

it('validates correct joined create form', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertValid();
});

it('fails missing categories', function () {
    unset($this->request['categories']);
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails incorrect category format', function () {
    $this->request['categories'] = rand(1,57);
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails incorrect category item format', function () {
    $this->request['categories'][] = 'a';
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails non-existant category', function () {
    $invalidCat = (Category::all()->count()) + 10;
    $this->request['categories'][] = $invalidCat;
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails missing url', function () {
    unset($this->request['url']);
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails incorrect url format', function () {
    $this->request['url'] = faker()->word;
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails missing subject', function () {
    unset($this->request['subject']);
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('fails non-string subject', function () {
    $this->request['subject'] = 34950;
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});

it('validates empty approved', function () {
    unset($this->request['approved']);
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertValid();
});

it('fails non-bool approved', function () {
    $this->request['approved'] = 'text';
    $response = $this->actingAs($this->user)->post('/fanatic/joined', $this->request);

    $response->assertInvalid();
});