<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\User::class, 50)->create();
        factory(App\Model\Checklist::class, 50)->create();
        factory(App\Model\ListItem::class, 50)->create();
    }
}
