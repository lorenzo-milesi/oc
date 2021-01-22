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
        <div class="w-96">
            <p>
                Votre demande a été prise en compte et bien enregistrée chez nous.
            </p>
            <div class="h-2"></div>
            <p>
                Si les informations communiquées nous permettent d'identifier un client,
                ce dernier sera effectivement effacé des listes de campagnes sous 48h.
            </p>
            <div class="h-2"></div>
            <p>
                Merci et à bientôt.
            </p>
            <div class="h-8"></div>
            <a class="bg-blue-500 text-white p-2" href="{{ route('portail.create') }}">
                Effectuer une nouvelle demande
            </a>
        </div>
    </body>
</html>
