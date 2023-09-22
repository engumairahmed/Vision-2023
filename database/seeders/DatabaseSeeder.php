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
        $pass='pass1234';
        User::factory()->create([
            'name' => 'Admin Account',
            'email' => 'admin@mail',
            'is_admin'=>1,
            'is_active'=>1,
            'password' => Hash::make($pass),
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'is_active'=>1,
            'email' => 'test@mail',
            'password' => Hash::make($pass),
        ]);
        User::factory()->create([
            'name' => 'Test2 User2',
            'is_active'=>1,
            'email' => 'test2@mail.com',
            'password' => Hash::make($pass),
        ]);
        User::factory()->create([
            'name' => 'Test3 User3',
            'is_active'=>1,
            'email' => 'test3@mail.com',
            'password' => Hash::make($pass),
        ]);
        User::factory()->create([
            'name' => 'Doctor User',
            'is_active'=>1,
            'email' => 'doc@mail',
            'password' => Hash::make($pass),
            'is_doctor'=>1,
        ]);
        User::factory()->create([
            'name' => 'Doctor User2',
            'is_active'=>1,
            'email' => 'doc2@mail',
            'password' => Hash::make($pass),
            'is_doctor'=>1,
        ]);
        Patient::create([
            'pat_user_id'=>2,
            'father_name' => 'Father Name',
            'pat_gender' => 'Male',
            'pat_contact' => '0300-1234567',
            'pat_DOB'=>'2012-11-09',
        ]);
        Patient::create([
            'pat_user_id'=>3,
            'father_name' => 'Father Name',
            'pat_gender' => 'Female',
            'pat_contact' => '0300-1234567',
            'pat_DOB'=>'2010-11-09',
        ]);
        Patient::create([
            'pat_user_id'=>4,
            'father_name' => 'Father Name',
            'pat_gender' => 'Female',
            'pat_contact' => '0300-1234567',
            'pat_DOB'=>'2000-11-09',
        ]);
        Doctor::create([
            'doc_user_id'=>5,
            'specialization' => 'Pediatrician ',
            'qualification' => 'MBBS',
            'housejob_start_date' => '2002-11-09',
            'experience'=>'20 Years',
            'charges'=>2000,
            'working_days'=>'Mon,Wed,Thur',
            'timings'=>'11AM-2PM',
            'doc_gender' => 'Male',
            'doc_contact' => '0300-1234567',
            'doc_DOB'=>'2010-11-09',
        ]);Doctor::create([
            'doc_user_id'=>6,
            'specialization' => 'XYZ',
            'qualification' => 'MBBS,FCPS',
            'housejob_start_date' => '1992-11-09',
            'experience'=>'30 Years',
            'charges'=>3000,
            'working_days'=>'Mon,Wed,Thur',
            'timings'=>'7PM-11PM',
            'doc_gender' => 'Female',
            'doc_contact' => '0300-1234567',
            'doc_DOB'=>'1970-05-08',
        ]);
        MedicalCondition::create([
            'condition_name'=>'Flu',
            'condition_description' => 'Details & descriptions of medical condition',
        ]);
        MedicalCondition::create([
            'condition_name'=>'Diabetes',
            'condition_description' => 'Details & descriptions of medical condition',
        ]);
        MedicalCondition::create([
            'condition_name'=>'Hypertension',
            'condition_description' => 'Details & descriptions of medical condition',
        ]);
        MedicalCondition::create([
            'condition_name'=>'Fever',
            'condition_description' => 'Details & descriptions of medical condition',
        ]);
        medication::create([
            'medicine'=>'Paracetamol',
            'dosage' => 'xyz mg',
            'medic_description' => 'Details & descriptions of medicines',
        ]);
        medication::create([
            'medicine'=>'Ibuprofen',
            'dosage' => 'xyz mg',
            'medic_description' => 'Details & descriptions of medicines',
        ]);
        medication::create([
            'medicine'=>'XYZ Name',
            'dosage' => 'xyz mg',
            'medic_description' => 'Details & descriptions of medicines',
        ]);
        LabTest::create([
            'test_name'=>'Complete Blood Count-(CBC)',
            'test_description' => 'Details & descriptions',
        ]);
        LabTest::create([
            'test_name'=>'Random Blood Sugar-(RBS)',
            'test_description' => 'Details & descriptions',
        ]);
        SurgicalProcedure::create([
            'sp_name'=>'Procedure Name',
            'sp_description' => 'Details & descriptions',
        ]);

    }
}
