<?php

namespace Database\Seeders;

use App\Models\Admin\Event;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Exhibitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('events');
        Storage::deleteDirectory('depositos');

        Storage::makeDirectory('events');
        Storage::makeDirectory('depositos');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrganizerSeeder::class);
        Event::factory(20)->create();
        Student::factory(150)->create();
        Detail::factory(30)->create();
        Document::factory(30)->create();    
 
    }
}
