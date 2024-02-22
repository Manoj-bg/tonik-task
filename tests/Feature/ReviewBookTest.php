<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\UserBookReviews;
use Illuminate\Support\Facades\Auth;

class ReviewBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_review_book()
    {
        // Create a user and authenticate
        $user = User::factory()->create([
            'type' => 'user',
        ]);
        $this->actingAs($user);

        // Create a book
        $book = Book::factory()->create();

        // Send POST request to review book
        $response = $this->post(route('reviewbook'), [
            'book_id' => $book->id,
            'review' => 'This is a test review.',
        ]);

        // Assert redirect
        $response->assertRedirect();

        // Assert review is saved in the database
        $this->assertDatabaseHas('user_book_reviews', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'review' => 'This is a test review.',
        ]);

        // Assert success message
        $response->assertSessionHas('success', 'Book reviewed successfully!');
    }

    /** @test */
    public function unauthenticated_user_cannot_review_book()
    {
        // Ensure no user is authenticated

        // Create a book
        $book = Book::factory()->create();

        // Send POST request to review book
        $response = $this->post(route('reviewbook'), [
            'book_id' => $book->id,
            'review' => 'This is a test review.',
        ]);

        // Assert redirect to login page
        $response->assertRedirect('/login');
    }
}
