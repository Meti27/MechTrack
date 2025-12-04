<?php

it('shows the public home page', function () {
    $this->get('/')
        ->assertStatus(200)
        ->assertSee('Track Repair');
});
