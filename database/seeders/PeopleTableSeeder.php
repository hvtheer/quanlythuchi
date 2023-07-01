<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            $data=array(
                array(
                    'idCard' => $i,
                    'firstName' => 'HUHU ' . $i,
                    'lastName' => 'Hoang',
                    'dateOfBirth' => '2017-02-28',
                    'avatar' => 'uploads/avatar/'. $i.'.jpeg',
                    'gender' => 'male',
                    'email' => $i.'@gmail.com',
                    'numberPhone' => '0915717'. $i,
                    'ethnic' => 'Kinh',
                    'nationality' => 'Viet',
                    'address' => 'ngõ 18/175 Giải Phóng',
                    'occupation' => 'Student',
                    'educationLevel' => '12/12',
                    'maritalStatus' => 'single',
                    'status' => 'alive',
                    'created_at' => '2023-06-29 17:56:23',
                    'updated_at' => '2023-06-29 17:56:23'
                )
            );
    
            DB::table('persons')->insert($data);
        }
    }
}
