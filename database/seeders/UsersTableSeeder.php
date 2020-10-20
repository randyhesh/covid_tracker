<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->truncate();

            $date = Carbon::now();

            DB::beginTransaction();

            /*------------ MAIN ADMIN ------------*/
            DB::table('users')->insert([
                'name' => 'Admin User',
                'email' => 'admin@email.com',
                'email_verified_at' => null,
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => null
            ],[
                'name' => 'Heshani Herath',
                'email' => 'heshani@email.com',
                'email_verified_at' => null,
                'password' => bcrypt('heshani'),
                'role' => 'user',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => null
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
