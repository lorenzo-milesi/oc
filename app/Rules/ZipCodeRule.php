<?php

/**
 * Permet de vérifier qu'un champ correspond au format de code postal (France).
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

/**
 * PHP Version 7
 *
 * @category Rule
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

class ZipCodeRule implements Rule
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
        $codes = config('zip.codes');
        $match = array_filter($codes, fn ($code) => $value === $code);

        return count($match) > 0 || empty($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le code postal renseigné est invalide.';
    }
}
