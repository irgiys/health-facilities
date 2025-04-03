<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class TypeSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     */
    public function __construct()
    {
        $this->file = '/database/data/types.csv';
        $this->delimiter = '|';
        $this->foreignKeyCheck = true;
    }
    public function run(): void
    {
        parent::run();
    }
}
