<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{

    use RefreshDatabase;

    private $book;

    public function setup(): void
    {
        parent::setup();
    }
}
