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
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Facades\App\Domain\FileManager;
use Illuminate\Support\Facades\Storage;

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
    public function store(PortailRequest $request)
    {
        $data = $request->validated();
        $date = (Carbon::now())->toDateString();
        if (!Storage::exists("file_$date.txt")) {
            Storage::put("file_$date.txt", '');
        }
        // @phpstan-ignore-next-line
        Storage::append("file_$date.txt", FileManager::format($data));

        // @phpstan-ignore-next-line
        return redirect()->route('portail.stored');
    }

    /**
     * Affiche la page de confirmation après envoi.
     *
     * @return View | Factory
     */
    public function stored(): View | Factory
    {
        return view('portail.stored');
    }
}
