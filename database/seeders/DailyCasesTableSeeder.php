<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class DailyCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        try
        {
            DB::table('daily_cases')->truncate();

            DB::beginTransaction();

            DB::table('daily_cases')->insert([
                'reported_date' => '2020-10-20',
                'detected_province_id' => '1',
                'detected_district_id' => '1',
                'detected_city_id' => '1',
                'patient_name' => 'John',
                'gender' => 'M',
                'dob' => '2001-01-20',
                'nationality' => 'Sri_Lankan',
                'status' => 'CONFIRMED_CASE',
                'place_of_death' => null,
                'date_of_death' => null,
                'deleted_at' => null,
                'created_at' => '2020-10-20',
                'created_by' => 1,
                'updated_at' => '2020-10-20'
            ],[
                'reported_date' => '2020-10-20',
                'detected_province_id' => '1',
                'detected_district_id' => '1',
                'detected_city_id' => '1',
                'patient_name' => 'Mary',
                'gender' => 'F',
                'dob' => '2001-01-20',
                'nationality' => 'Sri_Lankan',
                'status' => 'SUSPECTED_HOSPITALIZED',
                'place_of_death' => null,
                'date_of_death' => null,
                'deleted_at' => null,
                'created_at' => '2020-10-20',
                'created_by' => 1,
                'updated_at' => '2020-10-20'
            ],[
                'reported_date' => '2020-10-20',
                'detected_province_id' => '1',
                'detected_district_id' => '1',
                'detected_city_id' => '1',
                'patient_name' => 'Ann',
                'gender' => 'F',
                'dob' => '2001-01-20',
                'nationality' => 'Sri_Lankan',
                'status' => 'SUSPECTED_HOSPITALIZED',
                'place_of_death' => null,
                'date_of_death' => null,
                'deleted_at' => null,
                'created_at' => '2020-10-20',
                'created_by' => 1,
                'updated_at' => '2020-10-20'
            ]);
        }
        catch (Exception $e)
        {
            var_dump($e->getMessage());

            DB::rollBack();
        }

        DB::commit();
    }
}
