<?php

/**
 * Project Routes
 *
 * PHP Version 7
 *
 * @category Routes
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;

Route::get('/', [PortailController::class, 'create'])->name('portail.create');
Route::post('/portail', [PortailController::class, 'store'])->name('portail.store');
