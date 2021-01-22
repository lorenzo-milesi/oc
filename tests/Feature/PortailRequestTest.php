<?php

/**
 * Permet de gérer les tests de validation relatifs au portail
 * (formulaire repoussoir).
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Permet de gérer les tests de validation relatifs au portail
 * (formulaire repoussoir).
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

class PortailRequestTest extends TestCase
{
    /**
     * Au moins << prenom >> ou << code_postal >> doit être renseigné
     *
     * @return void
     */
    public function testPrenomOuCodePostalObligatoire()
    {
        $response = $this->post(
            route(
                'portail.store',
                [
                    'nom'         => 'Valide',
                    'prenom'      => null,
                    'code_postal' => null,
                ]
            )
        );

        $response->assertSessionHasErrors(['prenom', 'code_postal']);

        $response = $this->post(
            route(
                'portail.store',
                [
                    'nom'         => 'Valide',
                    'prenom'      => 'Prénom',
                    'code_postal' => null,
                ]
            )
        );

        $response->assertSessionDoesntHaveErrors(['prenom', 'code_postal']);

        $response = $this->post(
            route(
                'portail.store',
                [
                    'nom'         => 'Valide',
                    'prenom'      => null,
                    'code_postal' => '77100',
                ]
            )
        );

        $response->assertSessionDoesntHaveErrors(['prenom', 'code_postal']);

        $response = $this->post(
            route(
                'portail.store',
                [
                    'nom'         => 'Valide',
                    'prenom'      => 'Prénom',
                    'code_postal' => '77100',
                ]
            )
        );

        $response->assertSessionDoesntHaveErrors(['prenom', 'code_postal']);
    }
}
