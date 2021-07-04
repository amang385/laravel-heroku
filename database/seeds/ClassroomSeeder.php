<?php

use Illuminate\Database\Seeder;
use App\Classroom;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=1; $i <= 6 ; $i++) { 
            $classroom = new Classroom();
            $classroom->classrooms_name = 'ม.'.$i;
            $classroom->save();
       }
    }
}
