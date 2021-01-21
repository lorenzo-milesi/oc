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
        <form class="w-96" method="POST" action="{{ route('portail.store') }}">
            @csrf

            <div class="flex flex-col">
                <label for="nom">Nom</label>
                <input class="border border-1 rounded p-2" type="text" id="nom" name="nom">
            </div>

            <div class="h-2"></div>

            <div class="flex flex-col">
                <label for="prenom">Prénom</label>
                <input class="border border-1 rounded p-2" type="text" id="prenom" name="prenom">
            </div>

            <div class="h-2"></div>

            <div class="flex flex-col">
                <label for="adresse">Adresse</label>
                <input class="border border-1 rounded p-2" type="text" id="adresse" name="adresse">
            </div>

            <div class="h-2"></div>

            <div class="flex flex-col">
                <label for="code_postal">Code Postal</label>
                <input class="border border-1 rounded p-2" type="text" id="code_postal" name="code_postal">
            </div>

            <div class="h-2"></div>

            <div class="flex flex-col">
                <label for="ville">Ville</label>
                <input class="border border-1 rounded p-2" type="text" id="ville" name="ville">
            </div>

            <div class="h-2"></div>

            <div class="flex justify-end">
                <button class="bg-blue-500 p-2 text-white rounded" type="submit">Envoyer</button>
            </div>
        </form>

        <div class="h-2"></div>
        @if ($errors->any())
            <div class="w-96 bg-red-100 p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-800">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>
