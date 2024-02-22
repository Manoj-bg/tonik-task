<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Support\Facades\Auth;

class BorrowBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_borrow_available_book()
    {
        // Create an user
        $user = User::factory()->create([
            'type' => 'user',
        ]);

        // Authenticate as the user
        $this->actingAs($user);

        // Create a book with quantity more than 0
        $book = Book::factory()->create(['qty' => 1]);

        // Send a request to borrow the book
        $response = $this->get("/book/{$book->id}/borrow");

        // Assert redirect
        $response->assertRedirect();

        // Assert success message
        $response->assertSessionHas('success', 'Book borrowed successfully!');

        // Assert that the user book record is created
        $this->assertDatabaseHas('user_books', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'Borrowed',
            'qty' => 1,
        ]);

        // Assert that the book's quantity is decremented by 1
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'qty' => 0,
        ]);
    }
}
