<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = file_get_contents(__DIR__ . '/data/projects.json');
        $projects = json_decode($projects, true);
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->github = $project['github'];
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->logo = $project['logo'];
            $newProject->image = ProjectSeeder::storeimage($project['image'], $newProject->slug);
            $newProject->status = $project['status'];
            $newProject->description = $project['description'];
            $newProject->save();
        }
    }
    public static function storeimage($imgUrl, $slug)
    {
        $contents = file_get_contents(resource_path('img/' . $imgUrl));
        $imageName = $slug . '.png';
        $path = 'uploads/' . $imageName;
        Storage::put($path, $contents);
        return $imageName;
    }
}
