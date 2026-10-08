# Guide de Référence & Conventions de Code — Maison La Recette

Ce document sert de référence absolue pour l'intégration de la maquette Figma et le développement de l'application Laravel / Blade / Filament.

---

## 1. Architecture & Découpage des Composants Blade

- **Atomicité & Réutilisabilité maximale :** 
  - Découper le code en petits composants ciblés dans `resources/views/components/`.
  - Éviter les gros blocs monolithiques. Chaque section ou sous-élément logique a son composant (ex. `hero`, `social-cards`, `faq-accordion`, etc.).
- **Dossiers de composants suggérés :**
  - `components/ui/` : éléments graphiques bas niveau (boutons, badges, cartes génériques, titres).
  - `components/forms/` : formulaires et inputs atomiques (`input-text`, `input-email`, `textarea`, `select`, etc.).
  - `components/layout/` : header, footer, navigation, conteneurs.
  - `components/sections/` : sections spécifiques de pages (ex. `sections/home/hero.blade.php`, `sections/home/faq.blade.php`).
  - `components/podcasts/` & `components/experiences/` : composants métier existants.

---

## 2. Répétition & Dynamisme (Pas de dur en dur)

- **Principe DRY :** Dès qu'un élément visuel se répète (ex. cartes de réseaux sociaux, questions de FAQ, éléments de menu, listes d'ateliers, etc.), **ne jamais coder les éléments en dur à la chaîne**.
- **Utilisation des boucles :** Toujours passer par des boucles `@foreach` ou `@forelse`.
- **Bloc `@php` de mock/fallback :**
  - Si les données proviennent de la BDD ou d'un modèle Eloquent, les injecter depuis le contrôleur ou le composant.
  - Si certaines données nécessaires pour reproduire fidèlement la maquette n'existent **pas encore en base de données ou dans les modèles**, déclarer un bloc `@php ... @endphp` propre et structuré **en haut du fichier Blade** contenant les tableaux de données associatifs à itérer.

Exemple :
```blade
@php
$faqItems = [
    [
        'question' => 'Comment confirmer ma réservation ?',
        'answer' => 'Modalités de confirmation à préciser.',
    ],
    [
        'question' => 'Quels sont les horaires et le lieu ?',
        'answer' => 'Retrouvez les informations détaillées sur votre convocation.',
    ],
];
@endphp

@foreach($faqItems as $item)
    <x-ui.faq-item :question="$item['question']" :answer="$item['answer']" />
@endforeach
```

---

## 3. Données, Base de Données & Modèles Filament

- **Alignement strict avec la BDD :** 
  - Toujours inspecter les modèles Eloquent (`app/Models/`) et les migrations (`database/migrations/`).
  - Respecter les noms exacts des colonnes et des casts (ex. `ContactEntry` : `first_name`, `last_name`, `email`, `phone`, `object`, `message`, `type`, `company_name`).
- **Cohérence Filament :** 
  - Respecter les ressources et schémas d'administration Filament déjà existants.
  - Vérifier la compatibilité des champs créés en front avec ce qui est attendu dans l'admin panel.

---

## 4. Routes Nommées

- **Conventions :**
  - Toutes les routes dans [routes/web.php](file:///Users/tayibbouzekri/Repo/M1Dev/WorkShop_la_recette/la-recette-web/routes/web.php) doivent être nommées de façon explicite via `->name(...)`.
- **Nomenclature :**
  - `home` : Page d'accueil (`/`)
  - `about` : À propos (`/about`)
  - `articles.index` / `articles.show` : Articles / Blog
  - `contact.index` / `contact.store` : Formulaire de contact
  - `experiences.index` / `experiences.show` : Expériences
  - `podcasts.index` / `podcasts.show` : Podcasts
- **Génération d'URLs :** Utiliser systématiquement l'helper `route('nom_de_la_route')` dans les liens Blade (`<a href="{{ route('home') }}">`).

---

## 5. Formulaires & Gestion des Inputs

- **Composant conteneur `form` :**
  - Créer un composant dédié pour le formulaire complet (ex. `<x-forms.contact-form />`).
  - Gérer les directives CSRF (`@csrf`), la méthode (`POST`), la gestion des erreurs de validation (`@error`), et les anciens inputs (`old(...)`).
- **Composants d'inputs atomiques par type :**
  - `resources/views/components/forms/input-text.blade.php`
  - `resources/views/components/forms/input-email.blade.php`
  - `resources/views/components/forms/input-tel.blade.php`
  - `resources/views/components/forms/textarea.blade.php`
  - `resources/views/components/forms/select.blade.php`
- **Contrôleurs dédiés :**
  - Traiter la soumission via un contrôleur dédié (ex. `ContactController@store`).
  - Valider strictement les données en se basant sur le modèle `ContactEntry` et ses règles d'intégrité avant enregistrement.
  - S'appuyer sur le code et les contrôleurs déjà existants dans le projet.
