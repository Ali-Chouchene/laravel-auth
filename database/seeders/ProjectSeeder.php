<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->name = $faker->text(10);
            $project->description = $faker->paragraphs(10, true);
            // $project->image = $faker->imageUrl(300, 300);
            $project->link = $faker->url();
            $project->save();
        }
    }
}
