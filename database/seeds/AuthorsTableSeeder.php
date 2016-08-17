<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->delete();

        Author::create(array(
            'name' => 'Shine',
            'surname' => 'One'
        ));

        Author::create(array(
            'name' => 'Two',
            'surname' => 'Shine'
        ));

        Author::create(array(
            'name' => 'Three',
            'surname' => 'Four'
        ));
    }
}
