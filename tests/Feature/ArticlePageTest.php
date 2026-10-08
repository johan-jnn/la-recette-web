<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePageTest extends TestCase
{
    use RefreshDatabase;

    private function makeArticle(array $attributes = []): Article
    {
        return Article::create(array_merge([
            'title' => 'Les coulisses du podcast',
            'description' => 'Comment naît un épisode.',
            'body' => '<p>Corps de l’article</p>',
            'thumbnail_url' => '',
        ], $attributes));
    }

    public function test_it_displays_an_article_with_its_associated_experience(): void
    {
        $experience = Experience::create(['title' => 'Atelier culinaire', 'presentation' => '<p>Présentation</p>']);
        $article = $this->makeArticle(['experience_id' => $experience->id]);

        $this->get(route('articles.show', $article))
            ->assertOk()
            ->assertSee('Les coulisses du podcast')
            ->assertSee('<p>Corps de l’article</p>', false)
            ->assertSee('L’expérience associée')
            ->assertSee(route('experiences.show', ['id' => $experience->id]));
    }

    public function test_the_experience_section_is_hidden_without_experience(): void
    {
        $article = $this->makeArticle();

        $this->get(route('articles.show', $article))
            ->assertOk()
            ->assertDontSee('L’expérience associée');
    }

    public function test_other_articles_are_suggested(): void
    {
        $article = $this->makeArticle();
        $this->makeArticle(['title' => 'Un autre article']);

        $this->get(route('articles.show', $article))
            ->assertSee('À lire aussi')
            ->assertSee('Un autre article');
    }

    public function test_an_unknown_article_returns_a_404(): void
    {
        $this->get('/blog/999')->assertNotFound();
    }
}
