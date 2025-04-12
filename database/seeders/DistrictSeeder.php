<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class DistrictSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     */
    public function __construct()
    {
        $this->file = '/database/data/districts.csv';
        $this->delimiter = '|';
        $this->foreignKeyCheck = true;
    }
    public function run(): void
    {
        parent::run();
    }
}
