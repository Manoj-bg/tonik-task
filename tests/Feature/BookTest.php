<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user
        $admin = User::factory()->create([
            'type' => 'admin',
        ]);

        // Authenticate as the admin user
        $this->actingAs($admin);
    }

    /** @test */
    public function it_saves_a_book()
    {
        $data = [
            'book_name' => 'Sample Book',
            'sku_code' => 'SAMPLE123',
            'author' => 'Sample Author',
            'qty' => 5,
        ];

        $response = $this->post('/admin/savebook', $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Book added successfully!');

        $this->assertDatabaseHas('books', [
            'book_name' => 'Sample Book',
            'sku_code' => 'SAMPLE123',
            'author' => 'Sample Author',
            'qty' => 5,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post('/admin/savebook', []);

        $response->assertSessionHasErrors(['book_name', 'sku_code', 'author', 'qty']);
    }

    /** @test */
    public function it_validates_unique_sku_code()
    {
        // Create a book with the given SKU code
        Book::factory()->create(['book_name' => 'Another Book', 'sku_code' => 'DUPLICATE', 'author' => 'Another Author', 'qty' => 3]);

        $data = [
            'book_name' => 'Another Book',
            'sku_code' => 'DUPLICATE', // This SKU code should already exist
            'author' => 'Another Author', // Provide a value for the author field
            'qty' => 3,
        ];

        $response = $this->post('/admin/savebook', $data);

        $response->assertSessionHasErrors('sku_code');
    }
}
