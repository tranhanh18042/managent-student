<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Document;
use App\Models\Subject;
use App\Models\SubjectSections;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Subject::factory(10)->create();
        UserSubject::factory(10)->create();
        SubjectSections::factory(10)->create();
        Document::factory(10)->create();
    }
}
