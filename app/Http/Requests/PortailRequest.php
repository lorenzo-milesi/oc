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
use App\Rules\AlphaDashSpacesNoNumberRule;

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
                new AlphaDashSpacesNoNumberRule(),
            ],
            'prenom' => [
                'required_if:code_postal,null',
                new AlphaDashSpacesNoNumberRule(),
            ],
            'code_postal' => [
                'required_if:prenom,null',
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
            'nom.alpha_dash'          => 'Le nom ne doit pas contenir des caratères spéciaux',
            'prenom.required_if'      => 'Le prénom est obligatoire (si pas de code postal)',
            'prenom.alpha_dash'       => 'Le prénom ne doit pas contenir des caratères spéciaux',
            'code_postal.required_if' => 'Le code postal est obligatoire (si pas de prénom)',
        ];
    }
}
