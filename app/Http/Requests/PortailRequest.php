<?php

/**
 * Permet de gérer les règles d'autorisations et de validation des
 * requêtes du portail (pour le fichier repoussoir).
 *
 * PHP Version 7
 *
 * @category Request
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NomPrenomRule;

/**
 * Permet de gérer les règles d'autorisations et de validation des
 * requêtes du portail (pour le fichier repoussoir).
 *
 * PHP Version 7
 *
 * @category Request
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class PortailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                new NomPrenomRule()
            ],
            'prenom' => [
                'required_if:code_postal,null'
            ],
            'code_postal' => [
                'required_if:prenom,null'
            ]
        ];
    }

    /**
     * Permet de personnaliser les messages de validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom.required'            => 'Le nom est obligatoire',
            'prenom.required_if'      => 'Le prénom est obligatoire (si pas de code postal)',
            'code_postal.required_if' => 'Le code postal est obligatoire (si pas de prénom)',
        ];
    }
}
