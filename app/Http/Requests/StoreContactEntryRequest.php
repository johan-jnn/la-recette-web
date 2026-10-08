<?php

namespace App\Http\Requests;

use App\Enums\ContactType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles alignées sur la table "contact_entries" et le formulaire Filament.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^\+?[0-9\s.\-()]{6,}$/'],
            'type' => ['required', Rule::enum(ContactType::class)],
            'company_name' => ['nullable', 'string', 'max:255'],
            'object' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'experience_ids' => ['nullable', 'array'],
            'experience_ids.*' => ['integer', 'distinct', 'exists:experiences,id'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'last_name' => 'nom',
            'first_name' => 'prénom',
            'email' => 'email',
            'phone' => 'numéro de téléphone',
            'type' => 'type de demande',
            'company_name' => "nom de l'entreprise",
            'object' => 'sujet',
            'message' => 'message',
            'experience_ids' => 'expériences concernées',
            'experience_ids.*' => 'expérience',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Le numéro de téléphone n’est pas valide.',
        ];
    }
}
