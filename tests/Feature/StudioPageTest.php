<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Js;
use Tests\TestCase;

class StudioPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_the_studio_offers(): void
    {
        $this->get(route('studio'))
            ->assertOk()
            ->assertSee('Amplifiez votre impact grâce au podcast')
            ->assertSee('Sponsoring')
            ->assertSee('Studio de production')
            ->assertSee('Évènement');
    }

    public function test_the_contact_form_preselects_a_quote_request(): void
    {
        $this->get(route('studio'))
            ->assertOk()
            ->assertSee(route('contact.store'))
            ->assertSee('value: ' . Js::from('devis'), false);
    }

    public function test_the_header_links_to_the_studio_page(): void
    {
        $this->get(route('home'))
            ->assertSee('href="' . route('studio') . '"', false);
    }
}
