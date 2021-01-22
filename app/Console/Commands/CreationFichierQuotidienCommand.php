<?php

/**
 * Permet de créer un fichier daté au jour de création si non existant.
 *
 * PHP Version 7
 *
 * @category Command
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * PHP Version 7
 *
 * @category Command
 * @package  App
 * @author   Lorenzo Milesi <lmilesi@dataneo.fr>
 * @license  Standard Copyright to DataNeo
 * @link     https://www.dataneo.fr/
 */
class CreationFichierQuotidienCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oc:fichier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description
        = 'Permet de créer un fichier de données daté du jour s\'il n\'existe pas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = (Carbon::now())->toDateString();
        if (Storage::exists("file_$date.txt")) {
            return 0;
        }
        Storage::put("file_$date.txt", '');
        return 0;
    }
}
