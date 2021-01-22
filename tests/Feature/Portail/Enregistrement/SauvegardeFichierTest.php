<?php

/**
 * Permet de gérer les tests de sauvegarde des saisies sur fichier.
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace Tests\Feature\Portail\Enregistrement;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Facades\App\Domain\FileManager;

/**
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class SauvegardeFichierTest extends TestCase
{
    /**
     * Vérifie que l'envoie de formulaire enregistre une nouvelle ligne
     * au fichier du jour.
     *
     * @return void
     */
    public function testSauvegarde()
    {
        // @phpstan-ignore-next-line
        $this->artisan('oc:fichier')->assertExitCode(0);
        $date = (Carbon::now())->toDateString();

        $this->post(
            route(
                'portail.store',
                [
                    'prenom'      => 'Valide',
                    'nom'         => 'Valide',
                    'adresse'     => 'Quelque part',
                    'code_postal' => '75010',
                    'ville'       => 'Paris sur Marne',
                ]
            )
        );

        $contenu = Storage::get("file_$date.txt");
        // @phpstan-ignore-next-line
        $ligne = FileManager::derniereLigne($contenu);
        $resultat = (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12};Valide;Valide;Quelque part;75010;Paris sur Marne$/',
            $ligne
        );
        $this->assertTrue($resultat);
    }
}
