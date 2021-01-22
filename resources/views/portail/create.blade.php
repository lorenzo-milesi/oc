<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Désinscription Client | Portail Optical Center</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="w-screen h-screen flex flex-col items-center justify-center">
        <h1 class="text-2xl w-96">
            Désinscription Client
        </h1>
        <div class="h-8"></div>
        <form class="w-96" method="POST" action="{{ route('portail.store') }}">
            @csrf

            @include('templates.input', ['field' => 'prenom', 'label' => 'Prénom'])

            <div class="h-2"></div>

            @include('templates.required', ['field' => 'nom', 'label' => 'Nom'])

            <div class="h-2"></div>

            @include('templates.input', ['field' => 'adresse', 'label' => 'Adresse'])

            <div class="h-2"></div>

            @include('templates.input', ['field' => 'code_postal', 'label' => 'Code Postal'])

            <div class="h-2"></div>

            @include('templates.input', ['field' => 'ville', 'label' => 'Ville'])

            <div class="h-4"></div>

            <div class="flex justify-end">
                <button class="bg-blue-500 p-2 text-white" type="submit">Envoyer</button>
            </div>
        </form>

        <div class="h-4"></div>

        <p>Les champs marqués d'une <span class="text-red-500">*</span> sont obligatoires</p>

        <div class="h-2"></div>
        @if ($errors->any())
            <div class="w-96 bg-red-500 p-2 text-white">
                Ce formulaire comporte des erreurs, veuillez vérifier votre saisie et
                le soumettre de nouveau.
            </div>
        @endif
    </body>
</html>
