<?php

it('redirects the root path to the default localized homepage', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('home', ['locale' => config('app.locale')]));
});
