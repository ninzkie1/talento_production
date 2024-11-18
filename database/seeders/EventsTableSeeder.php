<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        // Predefined events
        $events = ['Birthday', 'Wedding', 'Corporate', 'Concert'];

        foreach ($events as $event) {
            Event::create(['name' => $event]);
        }
    }
}