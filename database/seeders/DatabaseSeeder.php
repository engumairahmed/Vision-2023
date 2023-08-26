<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LabTest;
use App\Models\medical_condition;
use App\Models\medication;
use App\Models\patient;
use App\Models\surgical_procedure;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $pass='admin123';
        User::factory()->create([
            'name' => 'Admin Account',
            'email' => 'admin@mail',
            'is_admin'=>1,
            'password' => Hash::make($pass),
        ]);
        $pass='test1234';
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@mail',
            'password' => Hash::make($pass),
        ]);
        $pass='test1234';
        User::factory()->create([
            'name' => 'Test2 User2',
            'email' => 'test2@mail.com',
            'password' => Hash::make($pass),
        ]);
        $pass='test1234';
        User::factory()->create([
            'name' => 'Test3 User3',
            'email' => 'test3@mail.com',
            'password' => Hash::make($pass),
        ]);
        $pass='doctor12';
        User::factory()->create([
            'name' => 'Doctor User',
            'email' => 'doc@mail',
            'password' => Hash::make($pass),
            'is_doctor'=>1,
        ]);
        patient::create([
            'user_id'=>1,
            'father_name' => 'Father Name',
            'gender' => 'Male',
            'contact' => '0300-1234567',
            'DOB'=>'2011-11-11',
        ]);
        patient::create([
            'user_id'=>2,
            'father_name' => 'Father Name',
            'gender' => 'Male',
            'contact' => '0300-1234567',
            'DOB'=>'2012-11-11',
        ]);
        patient::create([
            'user_id'=>3,
            'father_name' => 'Father Name',
            'gender' => 'Female',
            'contact' => '0300-1234567',
            'DOB'=>'2010-11-11',
        ]);
        patient::create([
            'user_id'=>4,
            'father_name' => 'Father Name',
            'gender' => 'Female',
            'contact' => '0300-1234567',
            'DOB'=>'2000-11-11',
        ]);
        patient::create([
            'user_id'=>5,
            'father_name' => 'Father Name',
            'gender' => 'Male',
            'contact' => '0300-1234567',
            'DOB'=>'1991-07-14',
        ]);
        medical_condition::create([
            'condition_name'=>'Flu',
            'description' => 'Details & descriptions of medical condition',
        ]);
        medical_condition::create([
            'condition_name'=>'Diabetes',
            'description' => 'Details & descriptions of medical condition',
        ]);
        medical_condition::create([
            'condition_name'=>'Hypertension',
            'description' => 'Details & descriptions of medical condition',
        ]);
        medication::create([
            'medicine'=>'Paracetamol',
            'dosage' => 'xyz mg',
            'description' => 'Details & descriptions of medicines',
        ]);
        medication::create([
            'medicine'=>'Ibuprofen',
            'dosage' => 'xyz mg',
            'description' => 'Details & descriptions of medicines',
        ]);
        medication::create([
            'medicine'=>'XYZ Name',
            'dosage' => 'xyz mg',
            'description' => 'Details & descriptions of medicines',
        ]);
        LabTest::create([
            'test_name'=>'Complete Blood Count-(CBC)',
            'description' => 'Details & descriptions',
        ]);
        LabTest::create([
            'test_name'=>'Random Blood Sugar-(RBS)',
            'description' => 'Details & descriptions',
        ]);
        surgical_procedure::create([
            'procedure_name'=>'Procedure Name',
            'description' => 'Details & descriptions',
        ]);

    }
}
