<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\FileManager;

class FileManagerTest extends TestCase
{
    /**
     * Vérifie que le FileManager nettoie bien les lignes vides en fin de contenu.
     *
     * @return void
     */
    public function testLeFileManagerPeutNettoyerUnContenuNonVide()
    {
        $contenu = "Hello\n
            This\n
            Is\n
            \n
            Spartaaaaa\n
            \n
            \n
            \n
            ";

        $contenuAttendu = "Hello\n
            This\n
            Is\n
            \n
            Spartaaaaa";

        $fileManager = new FileManager();
        $contenuPropre = $fileManager->nettoyageContenu($contenu);

        $this->assertEquals($contenuAttendu, $contenuPropre);
    }

    /**
     * Vérifie que le FileManager retourne un contenu vide si le contenu est
     * déjà vide
     *
     * @return void
     */
    public function testLeFileManagerRetourneVideSiVide()
    {
        $contenu = "\n";

        $contenuAttendu = "";

        $fileManager = new FileManager();
        $contenuPropre = $fileManager->nettoyageContenu($contenu);

        $this->assertEquals($contenuAttendu, $contenuPropre);
    }

    /**
     * Vérifie que le FileManager retourne la dernière ligne non vide si le contenu
     * n'es pas vide
     *
     * @return void
     */
    public function testLeFileManagerRetourneLaDerniereLigneSiNonVide()
    {
        $contenu = "Coucou\n
            Les\n
            Gens\n
            \n";

        $ligneAttendue = "Gens";

        $fileManager = new FileManager();
        $ligneObtenue = $fileManager->derniereLigne($contenu);

        $this->assertEquals($ligneAttendue, $ligneObtenue);
    }

    /**
     * Vérifie que le FileManager peut formater une ligne selon les données
     * envoyées.
     *
     * @return void
     */
    public function testLeFileManagerPeutFormaterUneNouvelleLigne()
    {
        $donnees = [
            'prenom'      => 'Valide',
            'nom'         => 'Valide',
            'adresse'     => 'Quelque part',
            'code_postal' => '75010',
            'ville'       => 'Paris sur Marne',
        ];

        $fileManager   = new FileManager();
        $ligneFormatee = $fileManager->format($donnees);

        $resultat = (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12};Valide;Valide;Quelque part;75010;Paris sur Marne$/',
            $ligneFormatee
        );

        $this->assertTrue($resultat);
    }
}
