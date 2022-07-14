<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
  const PROPERTIES_TABLE = "properties";

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $properties = [
      ['id' => 1, 'name' => 'House 1'],
      ['id' => 2, 'name' => 'House 2'],
      ['id' => 3, 'name' => 'Flat 1'],
      ['id' => 4, 'name' => 'Flat 2'],
      ['id' => 5, 'name' => 'Villa 1'],
      ['id' => 6, 'name' => 'Villa 2'],
    ];

    // Only populate table if it's empty.
    if (DB::table(self::PROPERTIES_TABLE)->count() === 0) {
      DB::table(self::PROPERTIES_TABLE)->insert($properties);
    }
  }
}
