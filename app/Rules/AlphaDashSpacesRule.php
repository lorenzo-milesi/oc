<?php

/**
 * Ajoute une validation sur les champs de formulaires.
 * - Caractères alphabétiques et accentués autorisés
 * - Tirets et Underscores autorisés
 * - Espaces autorisés
 * - Chiffres autorisés
 * - Caractères spéciaux interdits
 *
 * PHP Version 7
 *
 * @category Rule
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

/**
 * PHP Version 7
 *
 * @category Rule
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class AlphaDashSpacesRule implements Rule
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
        return (bool) preg_match('/^[0-9A-zÀ-ú]*$/', $value)
            || Str::contains($value, ['-', '_', ' ']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Valeur invalide (caractères spéciaux interdits)';
    }
}
