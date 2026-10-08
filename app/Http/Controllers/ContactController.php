<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactEntryRequest;
use App\Models\ContactEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Enregistre une demande de contact et ses expériences associées.
     */
    public function store(StoreContactEntryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {
            $entry = ContactEntry::create(collect($data)->except('experience_ids')->all());

            if (! empty($data['experience_ids'])) {
                $entry->experiences()->attach($data['experience_ids']);
            }
        });

        return back()->with('success', 'Merci, votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
