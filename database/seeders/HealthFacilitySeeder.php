<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class HealthFacilitySeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     */
    public function __construct()
    {
        $this->file = '/database/data/health_facilities.csv';
        $this->delimiter = '|';
        $this->foreignKeyCheck = true;
    }

    public function run(): void
    {        
        // DB::disableQueryLog();
        parent::run();
    }
}
