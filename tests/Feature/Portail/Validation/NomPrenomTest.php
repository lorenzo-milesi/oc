<?php

namespace Tests\Feature\Portail\Validation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NomPrenomTest extends TestCase
{
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
     * Le champ << nom >> ne doit pas contenir des chiffres.
     *
     * @return void
     */
    public function testLeNomNeDoitPasContenirDesChiffres()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Chr234' ]));

        $response->assertSessionHasErrors(['nom']);
    }

    /**
     * Le champ << nom >> ne doit pas contenir des caratères spéciaux
     *
     * @return void
     */
    public function testLeNomNeDoitPasContenirDesCarateresSpeciaux()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Jean$' ]));

        $response->assertSessionHasErrors(['nom']);
    }

    /**
     * Le champ << nom >> peut contenir des tirets ou des underscores
     *
     * @return void
     */
    public function testLeNomPeutContenirDesTiretsOuDesUnderscores()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Jean-Noël' ]));

        $response->assertSessionDoesntHaveErrors(['nom']);

        $response = $this->post(route('portail.store', [ 'nom' => 'Jean_Noël' ]));

        $response->assertSessionDoesntHaveErrors(['nom']);
    }

    /**
     * Le champ << nom >> peut contenir des espaces
     *
     * @return void
     */
    public function testLeNomPeutContenirDesEspaces()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Jean Neige' ]));

        $response->assertSessionDoesntHaveErrors(['nom']);
    }

    /**
     * Le champ << nom >> peut contenir des accents
     *
     * @return void
     */
    public function testLeNomPeutContenirDesAccents()
    {
        $response = $this->post(route('portail.store', [ 'nom' => 'Noé' ]));

        $response->assertSessionDoesntHaveErrors(['nom']);
    }

    /**
     * Le champ << prenom >> ne doit pas contenir des chiffres.
     *
     * @return void
     */
    public function testLePrenomNeDoitPasContenirDesChiffres()
    {
        $response = $this->post(route('portail.store', [ 'prenom' => 'Chr234' ]));

        $response->assertSessionHasErrors(['prenom']);
    }

    /**
     * Le champ << prenom >> ne doit pas contenir des caratères spéciaux
     *
     * @return void
     */
    public function testLePrenomNeDoitPasContenirDesCarateresSpeciaux()
    {
        $response = $this->post(route('portail.store', [ 'prenom' => 'Jean$' ]));

        $response->assertSessionHasErrors(['prenom']);
    }

    /**
     * Le champ << prenom >> peut contenir des tirets ou des underscores
     *
     * @return void
     */
    public function testLePrenomPeutContenirDesTiretsOuDesUnderscores()
    {
        $response = $this->post(route('portail.store', [ 'prenom' => 'Jean-Noël' ]));

        $response->assertSessionDoesntHaveErrors(['prenom']);

        $response = $this->post(route('portail.store', [ 'prenom' => 'Jean_Noël' ]));

        $response->assertSessionDoesntHaveErrors(['prenom']);
    }

    /**
     * Le champ << nom >> peut contenir des espaces
     *
     * @return void
     */
    public function testLePrenomPeutContenirDesEspaces()
    {
        $response = $this->post(route('portail.store', [ 'prenom' => 'Jean Noël' ]));

        $response->assertSessionDoesntHaveErrors(['prenom']);
    }
}
