<?php

use Illuminate\Database\Seeder;

use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();

        Book::create(array(
            'title' => 'First Title',
            'isbn' => "4675455555555557",
            'price'=> '12.10',
            'cover' => 'a.jpg',
            'author_id' => 1
        ));

        Book::create(array(
            'title' => 'Second Title',
            'isbn' => "555555557",
            'price'=> '16.10',
            'cover' => 'b.jpg',
            'author_id' => 2
        ));

        Book::create(array(
            'title' => 'Third Title',
            'isbn' => "46754555",
            'price'=> '10.10',
            'cover' => 'c.jpg',
            'author_id' => 3
        ));
    }
}
