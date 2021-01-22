<?php

/**
 * Teste la commande de création de fichiers quotidiens.
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace Tests\Feature\Command;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

/**
 * Teste la commande de création de fichiers quotidiens.
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

class FichierTest extends TestCase
{
    /**
     * Vérifie que la commande de création de fichier fonctionne.
     *
     * @return void
     */
    public function testUneCommandePermetDeCreerUnFichierQuotidien()
    {
        $date = (Carbon::now())->toDateString();
        if (Storage::exists("file_$date.txt")) {
            Storage::delete("file_$date.txt");
        }
        // @phpstan-ignore-next-line
        $this->artisan('oc:fichier')->assertExitCode(0);
        $this->assertTrue(Storage::exists("file_$date.txt"));
    }
}
