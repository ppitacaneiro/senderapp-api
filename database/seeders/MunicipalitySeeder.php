<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try 
        {
            $path = public_path('sql/municipalities.sql');
            $sql = file_get_contents($path);
            DB::unprepared($sql);
        } 
        catch (\Exception $ex)
        {}
    }
}
