<?php

use App\Models\Category;
use App\Models\Collective;
use App\Models\Owned;
use function Pest\Faker\faker;

uses()->group('owned', 'admin');

beforeEach(function () {
    $this->user    = Collective::first();
    $this->request = [
        'categories'          => [rand(1, 57), rand(1, 57), rand(1, 57)],
        'subject'             => faker()->word,
        'status'              => 'current',
        'slug'                => faker()->slug(2),
        'title'               => faker()->sentence(),
        'opened'              => '04/14/2022',
        'hold_member_updates' => faker()->boolean(),
        'notify_pending'      => faker()->boolean(),
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

it('validates correct request', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertValid();
});

it('fails missing categories', function () {
    unset($this->request['categories']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['categories']);
});

it('fails non-array categories', function () {
    $this->request['categories'] = 'This is not an array.';
    $response                    = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['categories']);
});

it('fails empty categories array', function () {
    $this->request['categories'] = [];
    $response                    = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['categories']);
});

it('fails non-numeric category item', function () {
    $this->request['categories'][] = 'a';
    $response                      = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['categories.3']);
});

it('fails non-existant category', function () {
    $invalidCat                    = (Category::all()->count()) + 10;
    $this->request['categories'][] = $invalidCat;
    $response                      = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['categories.3']);
});

it('fails missing subject', function () {
    unset($this->request['subject']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['subject']);
});

it('fails non-string subject', function () {
    $this->request['subject'] = 39502;
    $response                 = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['subject']);
});

it('fails missing status', function () {
    unset($this->request['status']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['status']);
});

it('fails non-valid status', function () {
    $this->request['status'] = 'This is not a correct status.';
    $response                = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['status']);
});

it('fails missing slug', function () {
    unset($this->request['slug']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['slug']);
});

it('fails non-valid slug format', function () {
    $this->request['slug'] = 'This is not a valid slug.';
    $response              = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['slug']);
});

it('allows null title', function () {
    unset($this->request['title']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertValid(['title']);
});

it('fails non-string title', function () {
    $this->request['title'] = 494920;
    $response               = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['title']);
});

it('allows null opened', function () {
    unset($this->request['opened']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertValid(['opened']);
});

it('fails non-date opened', function () {
    $this->request['opened'] = 'This is not a date.';
    $response                = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['opened']);
});

it('allows null hold_member_updates', function () {
    unset($this->request['hold_member_updates']);
    $response = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertValid(['hold_member_updates']);
});

it('fails non-bool hold_member_updates', function () {
    $this->request['hold_member_updates']  = 'This is not a boolean.';
    $response                              = $this->actingAs($this->user)->post('/fanatic/owned', $this->request);

    $response->assertInvalid(['hold_member_updates']);
});

it('saves model to database', function () {
    $owned = Owned::factory()->create();

    $this->assertDatabaseHas('owned', ['id' => $owned->id]);
});
