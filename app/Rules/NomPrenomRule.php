<?php

/**
 * Permet de gérer la règle sur les champs nom et prénom du formulaire repoussoir.
 *
 * PHP Version 7
 *
 * @category Request
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Permet de gérer la règle sur les champs nom et prénom du formulaire repoussoir.
 *
 * PHP Version 7
 *
 * @category Request
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class NomPrenomRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute Le nom du champ
     * @param mixed  $value     La valeur saisie
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^([^0-9]*)$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le champ :attribute est invalide (aucun chiffre)';
    }
}
