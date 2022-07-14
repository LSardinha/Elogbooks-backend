<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
  const STATUSES_TABLE = "statuses";

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $statuses = [
      ['id' => 1, 'name' => 'Open'],
      ['id' => 2, 'name' => 'In progress'],
      ['id' => 3, 'name' => 'Completed'],
      ['id' => 4, 'name' => 'Cancelled'],
    ];

    // Only populate table if it's empty.
    if (DB::table(self::STATUSES_TABLE)->count() === 0) {
      DB::table(self::STATUSES_TABLE)->insert($statuses);
    }
  }
}
