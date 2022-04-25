<?php

use App\Models\Collective;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = Collective::first();
});

test('get joined index', function () {
    $response = $this->actingAs($this->user)->get('fanatic/joined');
    $response->assertViewIs('admin.joined.index');
});

test('get joined create', function () {
    $response = $this->actingAs($this->user)->get('fanatic/joined/create');
    $response->assertViewIs('admin.joined.create');
});

test('valid joined form passes create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'categories' => [3, 10],
        'url'        => 'http://punkfairie.net',
        'subject'    => 'Test',
    ]);

    $response->assertValid();
});

test('invalid category response does not pass create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'categories' => 4,
        'url'        => 'http://punkfairie.net',
        'subject'    => 'Test',
    ]);

    $response->assertInvalid();
});

test('invalid url does not pass create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'categories' => [4],
        'url'        => 'hello',
        'subject'    => 'Test',
    ]);

    $response->assertInvalid();
});

test('missing category does not pass create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'url'        => 'https://punkfairie.net',
        'subject'    => 'Test',
    ]);

    $response->assertInvalid();
});

test('missing subject does not pass create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'categories' => [1,5],
        'url'        => 'https://punkfairie.net',
    ]);

    $response->assertInvalid();
});

test('missing url does not pass create validation', function () {
    $response = $this->actingAs($this->user)->post('/fanatic/joined', [
        'categories' => [2],
        'subject'    => 'Test',
    ]);

    $response->assertInvalid();
});

// test('can upload joined button on create', function () {
//     Storage::fake('local');
//     $file = UploadedFile::fake()->image('code.png');

//     $response = $this->actingAs($this->user)->post('/fanatic/joined', [
//         'categories' => [3, 10],
//         'url'        => 'http://punkfairie.net',
//         'subject'    => 'Test',
//         'image'      => $file,
//     ]);

//     Storage::disk('local')->assertExists($file->hashName());
// });