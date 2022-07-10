<?php

namespace Database\Seeders;

use App\Models\Admin\Event;
use App\Models\Exhibitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::makeDirectory('events');
        Storage::makeDirectory('depositos');

        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(UnitSeeder::class);
        Exhibitor::factory(20)->create();
        Event::factory(50)->create();
        //$this->call(EventSeeder::class);
        Student::factory(150)->create();
    }
}
