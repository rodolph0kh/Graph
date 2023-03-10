<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('nodes')->insert([
            'type' => 'person',
            'name' => 'fadi',
            'properties' => json_encode([
                'age' => 20,
                'major' => 'cs'
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('nodes')->insert([
            'type' => 'person',
            'name' => 'samir',
            'properties' => json_encode([
                'age' => 40,
                'major' => 'ge'
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('nodes')->insert([
            'type' => 'person',
            'name' => 'said',
            'properties' => json_encode([
                'age' => 29,
                'major' => 'cce'
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('relationships')->insert([
            'type' => 'follows',
            'directed' => true,
            'source' => 1,
            'destination' => 2,
            'properties' => json_encode([
                'time' => 'since highschool',
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('relationships')->insert([
            'type' => 'follows',
            'directed' => true,
            'source' => 1,
            'destination' => 3,
            'properties' => json_encode([
                'time' => 'since highschool',
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('relationships')->insert([
            'type' => 'follows',
            'directed' => true,
            'source' => 2,
            'destination' => 3,
            'properties' => json_encode([
                'time' => 'since highschool',
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '1',
            'relationship_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '2',
            'relationship_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '1',
            'relationship_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '3',
            'relationship_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '2',
            'relationship_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('node_relationship')->insert([
            'node_id' => '3',
            'relationship_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
