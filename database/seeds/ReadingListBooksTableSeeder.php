<?php

use Illuminate\Database\Seeder;

class ReadingListBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\readinglistbook::class, 100)->create();

    }
}
