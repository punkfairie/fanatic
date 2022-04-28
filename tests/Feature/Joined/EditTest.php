<?php

use App\Models\Category;
use App\Models\Collective;
use App\Models\Joined;
use function Pest\Faker\faker;

uses()->group('joined', 'admin');

beforeEach(function () {
    $this->user    = Collective::first();
    $this->joined  = (Joined::inRandomOrder()->limit(1)->get())->first();
    $this->request = [
        'categories' => [rand(1, 57), rand(1, 57), rand(1, 57)],
        'url'        => faker()->url,
        'subject'    => faker()->word,
        'approved'   => faker()->boolean,
    ];
    $this->url = "/fanatic/joined/{$this->joined->id}";
});

it('has edit page', function () {
    $response = $this->actingAs($this->user)->get("{$this->url}/edit");

    $response->assertViewIs('admin.joined.edit');
});

it('hides edit page from guests', function () {
    $response = $this->get("{$this->url}/edit");

    $response->assertRedirect('/fanatic/login');
});

it('validates correct edit form', function () {
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertValid();
});

it('fails missing categories array', function () {
    unset($this->request['categories']);
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails non-array categories', function () {
    $this->request['categories'] = 4;
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails empty categories array', function () {
    $this->request['categories'] = [];
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails non-numeric categories item', function () {
    $this->request['categories'][] = 'a';
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails non-existant categories', function () {
    $invalidCat = (Category::all()->count()) + 10;
    $this->request['categories'][] = $invalidCat;
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails empty url', function () {
    unset($this->request['url']);
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails non-url url', function () {
    $this->request['url'] = 'this is not a url';
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails empty subject', function () {
    unset($this->request['subject']);
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('fails non-string subject', function () {
    $this->request['subject'] = 30582;
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('allows null approved', function () {
    unset($this->request['approved']);
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertValid();
});

it('fails non-bool approved', function () {
    $this->request['approved'] = 'this is not a truthy response';
    $response = $this->actingAs($this->user)->patch($this->url, $this->request);

    $response->assertInvalid();
});

it('updates item in database', function () {
    $joined = Joined::factory()->create();
    $joined->patch($this->request);

    $this->assertEquals($joined->subject, $this->request['subject']);
});
