<?php

it('has owned/create page', function () {
    $response = $this->get('/owned/create');

    $response->assertStatus(200);
});
