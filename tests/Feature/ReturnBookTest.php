<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UserBooks;
use App\Models\Book;
use App\Models\User;

class ReturnBookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an authenticated user
        $this->actingAs(User::factory()->create(['type' => 'user']));
    }

    /** @test */
    public function it_can_return_borrowed_book()
    {
        // Create a user book record
        $book = UserBooks::factory()->create();

        // Send a request to return the book
        $response = $this->get("/book/{$book->id}/return");

        // Assert redirect
        $response->assertRedirect();

        // Assert success message
        $response->assertSessionHas('success', 'Book returned successfully!');
    }
}
