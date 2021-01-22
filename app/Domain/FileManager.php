<?php

/**
 * FileManager
 *
 * PHP version 7
 *
 * @category Class
 * @package  App\Domain
 * @author   Lorenzo Milesi <lorenzo.milesi@live.fr>
 * @license  https://unlicense.org/ The Unlicense
 * @link     https://loren.zone
 */

namespace App\Domain;

use Illuminate\Support\Str;

/**
 * Offre des méthodes pour gérer un fichier.
 *
 * @category Class
 * @package  App\Domain
 * @author   Lorenzo Milesi <lorenzo.milesi@live.fr>
 * @license  https://unlicense.org/ The Unlicense
 * @link     https://loren.zone
 */
class FileManager
{
    /**
     * Nettoie les lignes vides d'un contenu
     *
     * @param string $contenu Le contenu à nettoyer
     *
     * @return string Le contenu nettoyé
     */
    public function nettoyageContenu(string $contenu)
    {
        return trim($contenu);
    }

    /**
     * Récupère la dernière ligne non vide (si contenu non vide).
     *
     * @param string $contenu Le contenu à analyser
     *
     * @return string La ligne récupérée
     */
    public function derniereLigne(string $contenu)
    {
        $contenuPropre = $this->nettoyageContenu($contenu);
        $lignes = explode(PHP_EOL, $contenuPropre);

        return trim($lignes[count($lignes) - 1]);
    }

    /**
     * Formate les données pour écrire une nouvelle ligne.
     *
     * @param array<int, string> $donnees Les données à formater.
     *
     * @return string Les données formatées en une seule ligne.
     */
    public function format(array $donnees)
    {
        $prenom     = $donnees['prenom'] ?? '';
        $nom        = $donnees['nom'] ?? '';
        $adresse    = $donnees['adresse'] ?? '';
        $codePostal = $donnees['code_postal'] ?? '';
        $ville      = $donnees['ville'] ?? '';

        return Str::uuid()
            . ';' . $prenom
            . ';' . $nom
            . ';' . $adresse
            . ';' . $codePostal
            . ';' . $ville;
    }
}
