<?php

use Illuminate\Database\Seeder;
use App\Model\Guardian;
use App\Model\Student;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $faker = Factory::create('id_ID');
        $guardians_count = Guardian::count();

        $this->command->getOutput()->progressStart(140);

        for ($i = 0; $i < 140; $i++) {
            $is_male = rand(0, 1);

            Student::create([
                'guardian_id' => ($i % $guardians_count) + 1,
                'name' => $faker->FirstName($is_male ? 'male' : 'female') . ' ' . $faker->lastName,
                'nis' => $faker->nik,
                'gender' => $is_male ? 'l' : 'p',
                'birth_date' => $faker->date('Y-m-d', '2013-01-01'),
                'address' => $faker->address,
                'class' => $faker->randomElement(['10', '11', '12']),
                'majors' => $faker->randomElement(['IPA', 'IPS', 'AGAMA', 'BAHASA']),
                'height' => rand(100, 200),
                'weight' => rand(40, 70),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
