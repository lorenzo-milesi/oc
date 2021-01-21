<?php

/**
 * Permet de gérer les tests relatifs au portail (formulaire repoussoir).
 *
 * PHP Version 7
 *
 * @category Controller
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
 * Permet de gérer les tests relatifs au portail (formulaire repoussoir).
 *
 * PHP Version 7
 *
 * @category Controller
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
     * Le champ << nom >> ne doit pas être vide.
     *
     * @return void
     */
    public function testLeNomEstObligatoire()
    {
        $response = $this->post(route('portail.store', [ 'nom' => null ]));

        $response->assertSessionHasErrors(['nom']);
    }

    /**
     * Le champ << nom >> ne doit pas contenir de chiffres.
     *
     * @return void
     */
    public function testLeNomNeDoitPasContenirDeChiffres()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Chr234' ]));

        $response->assertSessionHasErrors(['nom']);
    }

    /**
     * Le champ << nom >> peut contenir des tirets
     *
     * @return void
     */
    public function testLeNomPeutContenirDesTirets()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Jean-Noël' ]));

        $response->assertSessionDoesntHaveErrors(['nom']);
    }

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
