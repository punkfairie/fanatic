<?php

use App\Models\Joined;

uses()->group('joined', 'admin');

it('destroys item in database', function () {
    $joined = Joined::factory()->create();
    $id = $joined->id;
    $this->assertDatabaseHas('joined', ['id' => $id]);

    $joined->remove();
    $this->assertDatabaseMissing('joined', ['id' => $id]);
});
