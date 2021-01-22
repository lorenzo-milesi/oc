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

namespace Tests\Feature\Portail\Validation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Permet de gérer les tests de validation relatifs au portail
 * (formulaire repoussoir) sur les champs
 * << adresse >>, << ville >> et << code_postal >>
 *
 * PHP Version 7
 *
 * @category Test
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

class AdresseTest extends TestCase
{
    /**
     * Le champ << adresse >> peut être nul.
     *
     * @return void
     */
    public function testAdressePeutEtreVide()
    {
        $response = $this->post(route('portail.store', [ 'adresse' => null ]));

        $response->assertSessionDoesntHaveErrors(['adresse']);
    }

    /**
     * Le champ << adresse >> ne doit pas contenir de caractères spéciaux.
     *
     * @return void
     */
    public function testAdresseNeDoitPasContenirDesCaracteresSpeciaux()
    {
        $response = $this->post(route('portail.store', [ 'adresse' => 'ic#@' ]));

        $response->assertSessionHasErrors(['adresse']);
    }

    /**
     * Le champ << ville >> peut être nul.
     *
     * @return void
     */
    public function testVillePeutEtreVide()
    {
        $response = $this->post(route('portail.store', [ 'ville' => null ]));

        $response->assertSessionDoesntHaveErrors(['ville']);
    }

    /**
     * Le champ << ville >> ne doit pas contenir de caractères spéciaux.
     *
     * @return void
     */
    public function testVilleNeDoitPasContenirDesCaracteresSpeciaux()
    {
        $response = $this->post(route('portail.store', [ 'ville' => 'ic#@' ]));

        $response->assertSessionHasErrors(['ville']);
    }

    /**
     * Le champ << code_postal >> doit être numérique
     *
     * @return void
     */
    public function testLeCodePostalDoitEtreNumerique()
    {
        $response = $this->post(route('portail.store', ['code_postal' => 'test']));

        $response->assertSessionHasErrors(['code_postal']);
    }

    /**
     * Le champ << code_postal >> doit être valide
     *
     * @return void
     */
    public function testLeCodePostalDoitEtreValide()
    {
        $response = $this->post(route('portail.store', ['code_postal' => '12']));

        $response->assertSessionHasErrors(['code_postal']);

        $response = $this->post(route('portail.store', ['code_postal' => '77100']));

        $response->assertSessionDoesntHaveErrors(['code_postal']);
    }
}
