<?php

use Illuminate\Database\Seeder;
use App\Subjects;
class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        subjects::insert(['name' => 'Eindwerk',]);
        subjects::insert(['name' => 'Stage',]);
    }
}
