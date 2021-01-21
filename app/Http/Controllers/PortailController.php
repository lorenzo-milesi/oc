<?php

/**
 * Permet de gérer les vues et les actions du portail.
 *
 * PHP Version 7
 *
 * @category Controller
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\PortailRequest;

/**
 * Permet de gérer les vues et les actions du portail.
 *
 * @category Controller
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class PortailController extends Controller
{
    /**
     * Ouvre la route show, permettant d'accéder au formulaire d'ajout d'une
     * personne au fichier repoussoir.
     *
     * @return View | Factory
     */
    public function create(): View | Factory
    {
        return view('portail.create');
    }

    /**
     * Enregistre une personne au fichier repoussoir (après validation).
     *
     * @param PortailRequest $request Les paramètres du formulaire (valides)
     *
     * @return void
     */
    public function store(PortailRequest $request): void
    {
    }
}
