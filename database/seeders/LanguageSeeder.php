<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `languages` (`slug`, `name`) VALUES ('en', 'English')");
        DB::insert("INSERT INTO `languages` (`slug`, `name`) VALUES ('fi', 'Finnish')");
    }
}
