<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booksData = [
            [
               'sku_code'   =>'ton001',
               'book_name'  =>'Harry Potter and the Philosophers Stone',
               'author' => 'J.K. Rowling',
               'qty' => 8
            ],
            [
                'sku_code'   =>'ton002',
                'book_name'  =>'A Game of Thrones',
                'author' => 'George R.R. Martin',
                'qty' => 1
             ],
             [
                'sku_code'   =>'ton003',
                'book_name'  =>'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'qty' => 2
             ],
             [
                'sku_code'   =>'ton004',
                'book_name'  =>'1984',
                'author' => 'George Orwell',
                'qty' => 4
             ],
             [
                'sku_code'   =>'ton005',
                'book_name'  =>'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'qty' => 6
             ],
             [
                'sku_code'   =>'ton006',
                'book_name'  =>'Pride and Prejudice',
                'author' => 'Jane Austen',
                'qty' => 8
             ],
             [
                'sku_code'   =>'ton007',
                'book_name'  =>'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'qty' => 7
             ],
             [
                'sku_code'   =>'ton008',
                'book_name'  =>'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'qty' => 4
             ],
             [
                'sku_code'   =>'ton009',
                'book_name'  =>'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'qty' => 5
             ],
             [
                'sku_code'   =>'ton0110',
                'book_name'  =>'The Chronicles of Narnia',
                'author' => 'C.S. Lewis',
                'qty' => 2
             ],
        ];
        foreach ($booksData as $key => $val) {
            Book::create($val);
        }
    }
}
