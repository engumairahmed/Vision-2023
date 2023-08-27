<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\MedicalCondition;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\SurgicalProcedure;
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
        User::factory()->create([
            'name' => 'Doctor User2',
            'email' => 'doc2@mail',
            'password' => Hash::make($pass),
            'is_doctor'=>1,
        ]);
        Patient::create([
            'user_id'=>1,
            'father_name' => 'Father Name',
            'gender' => 'Male',
            'contact' => '0300-1234567',
            'DOB'=>'2011-11-09',
        ]);
        Patient::create([
            'user_id'=>2,
            'father_name' => 'Father Name',
            'gender' => 'Male',
            'contact' => '0300-1234567',
            'DOB'=>'2012-11-09',
        ]);
        Patient::create([
            'user_id'=>3,
            'father_name' => 'Father Name',
            'gender' => 'Female',
            'contact' => '0300-1234567',
            'DOB'=>'2010-11-09',
        ]);
        Patient::create([
            'user_id'=>4,
            'father_name' => 'Father Name',
            'gender' => 'Female',
            'contact' => '0300-1234567',
            'DOB'=>'2000-11-09',
        ]);
        Doctor::create([
            'user_id'=>5,
            'specialization' => 'Peads',
            'qualification' => 'MBBS',
            'housejob_start_date' => '2002-11-09',
            'experience'=>'20 Years',
            'charges'=>2000,
            'working_days'=>'Mon,Wed,Thur',
            'timings'=>'11AM-2PM',
            'DOB'=>'1980-06-04'
        ]);Doctor::create([
            'user_id'=>6,
            'specialization' => 'XYZ',
            'qualification' => 'MBBS,FCPS',
            'housejob_start_date' => '1992-11-09',
            'experience'=>'30 Years',
            'charges'=>3000,
            'working_days'=>'Mon,Wed,Thur',
            'timings'=>'7PM-11PM',
            'DOB'=>'1970-05-08'
        ]);
        MedicalCondition::create([
            'condition_name'=>'Flu',
            'description' => 'Details & descriptions of medical condition',
        ]);
        MedicalCondition::create([
            'condition_name'=>'Diabetes',
            'description' => 'Details & descriptions of medical condition',
        ]);
        MedicalCondition::create([
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
        SurgicalProcedure::create([
            'procedure_name'=>'Procedure Name',
            'description' => 'Details & descriptions',
        ]);

    }
}
