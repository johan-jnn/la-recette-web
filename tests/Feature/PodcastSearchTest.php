<?php

namespace Tests\Feature;

use App\Models\Podcast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PodcastSearchTest extends TestCase
{
    use RefreshDatabase;

    private function makePodcast(string $title, string $duration): Podcast
    {
        return Podcast::create([
            'title' => $title,
            'description' => "Épisode {$title}",
            'cover_url' => '',
            'publish_date' => now(),
            'duration' => $duration,
        ]);
    }

    public function test_the_home_page_offers_the_search_popup(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Trouver un podcast')
            ->assertSee('action="'.route('podcasts.index').'#episodes"', false);
    }

    public function test_podcasts_are_filtered_by_keyword_and_duration(): void
    {
        $this->makePodcast('Les algues demain', '00:06:48');
        $this->makePodcast('La cuisine solaire', '01:10:00');

        $this->get(route('podcasts.index', ['q' => 'algues']))
            ->assertSee('Les algues demain')
            ->assertDontSee('La cuisine solaire');

        $this->get(route('podcasts.index', ['duration' => 'long']))
            ->assertSee('La cuisine solaire')
            ->assertDontSee('Les algues demain');
    }
}
