<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title' => 'Балалар үйіне көмек',
                'description' => 'Балалар үйіндегі балаларға киім, оқу құралдары және ойыншықтар сатып алу',
                'full_description' => 'Бұл жоба арқылы біз №1 балалар үйіндегі 50 балаға қыс киімдері, оқу құралдары және дамыту ойыншықтарын сатып алуды мақсат етеміз.',
                'target_amount' => 500000.00,
                'current_amount' => 125000.00,
                'status' => 'active',
                'start_date' => now()->subDays(10),
                'end_date' => now()->addDays(30)
            ],
            [
                'title' => 'Қарт адамдарға медициналық көмек',
                'description' => 'Қарт адамдар үйіне дәрі-дәрмек және медициналық аспаптар сатып алу',
                'full_description' => 'Қарт адамдар үйіндегі тұрғындарға қажетті дәрі-дәрмектер мен медициналық аспаптарды қамтамасыз ету.',
                'target_amount' => 750000.00,
                'current_amount' => 230000.00,
                'status' => 'active',
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(45)
            ],
            [
                'title' => 'Мүгедек балаларға арналған ойын алаңы',
                'description' => 'Мүгедек балалар үшін арнайы ойын алаңын салу',
                'full_description' => 'Қаладағы мүгедек балалар үшін арнайы жабдықталған, қауіпсіз ойын алаңын салу жобасы.',
                'target_amount' => 1200000.00,
                'current_amount' => 0.00,
                'status' => 'active',
                'start_date' => now(),
                'end_date' => now()->addDays(60)
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
