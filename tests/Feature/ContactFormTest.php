<?php

namespace Tests\Feature;

use App\Enums\ContactType;
use App\Models\ContactEntry;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'last_name' => 'Dupont',
            'first_name' => 'Marie',
            'email' => 'marie@example.com',
            'phone' => '06 12 34 56 78',
            'type' => ContactType::DEVIS->value,
            'company_name' => 'Maison Dupont',
            'object' => 'Atelier pour mon équipe',
            'message' => 'Bonjour, nous aimerions organiser un atelier.',
        ], $overrides);
    }

    public function test_it_stores_a_contact_entry(): void
    {
        $response = $this->from(route('contact.index'))->post(route('contact.store'), $this->validPayload());

        $response->assertRedirect(route('contact.index'));
        $response->assertSessionHas('success');
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_entries', [
            'email' => 'marie@example.com',
            'type' => ContactType::DEVIS->value,
            'company_name' => 'Maison Dupont',
        ]);
    }

    public function test_it_attaches_selected_experiences(): void
    {
        $experiences = collect(['Atelier', 'Food tour'])->map(fn ($title) => Experience::create([
            'title' => $title,
            'presentation' => '<p>Présentation</p>',
        ]));

        $this->post(route('contact.store'), $this->validPayload([
            'experience_ids' => $experiences->pluck('id')->all(),
        ]))->assertSessionHasNoErrors();

        $entry = ContactEntry::firstOrFail();
        $this->assertEqualsCanonicalizing($experiences->pluck('id')->all(), $entry->experiences->pluck('id')->all());
    }

    public function test_company_name_is_optional(): void
    {
        $this->post(route('contact.store'), $this->validPayload(['company_name' => null]))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_entries', ['company_name' => null]);
    }

    public function test_it_validates_the_payload(): void
    {
        $this->post(route('contact.store'), [
            'email' => 'pas-un-email',
            'phone' => 'abc',
            'type' => 'inconnu',
            'experience_ids' => [999],
        ])->assertSessionHasErrors([
            'last_name', 'first_name', 'email', 'phone', 'type', 'object', 'message', 'experience_ids.0',
        ]);

        $this->assertDatabaseCount('contact_entries', 0);
    }
}
