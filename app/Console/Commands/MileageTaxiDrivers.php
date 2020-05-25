<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;

class MileageTaxiDrivers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mileage:taxi_drivers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza el kilometraje de los taxistas a las 6 am';

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
     * @return mixed
     */
    public function handle()
    {
        $taxiDrivers= App\Taxi_Driver::All();
        foreach ($taxiDrivers as $taxiDriver) {
            $taxiDriver->mileage='0';
            $taxiDriver->save();
        }
       
    }
}
