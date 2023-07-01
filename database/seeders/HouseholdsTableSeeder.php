<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HouseholdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'address' => 'ABC',
            ),
            array(
                'address' => '123',
            ),
            array(
                'address' => '456',
            ),
            
        );

        DB::table('households')->insert($data);
    }
}
