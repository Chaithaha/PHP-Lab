<?php

it('redirects to students page', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect('/students');
});
