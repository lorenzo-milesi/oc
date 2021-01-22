<?php

/**
 * Permet de gérer les tests controlleur relatifs au portail
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
 * Permet de gérer les tests controlleur relatifs au portail
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
class PortailControllerTest extends TestCase
{
    /**
     * Vérifie qu'on puisse bien accéder à la page formulaire.
     *
     * @return void
     */
    public function testAccesPortail()
    {
        $response = $this->get(route('portail.create'));

        $response->assertStatus(200);
    }

    /**
     * Vérifie qu'on puisse bien accéder à la page de confirmation.
     *
     * @return void
     */
    public function testAccesPortailConfirmation()
    {
        $response = $this->get(route('portail.stored'));

        $response->assertStatus(200);
    }

    /**
     * S'assure que les champs demandés sont tous présents.
     *
     * @return void
     */
    public function testChampsPortail()
    {
        $response = $this->get(route('portail.create'));

        $response->assertSee(
            [
                'nom',
                'prenom',
                'adresse',
                'code_postal',
                'ville',
            ]
        );
    }

    /**
     * S'assure de la bonne redirection sur formulaire valide.
     *
     * @return void
     */
    public function testRedirectionApresEnvoi()
    {
        $response = $this->post(
            route(
                'portail.store',
                [
                    'nom'         => 'Valide',
                    'prenom'      => 'Valide',
                ]
            )
        );

        $response->assertRedirect('/portail');
    }
}
