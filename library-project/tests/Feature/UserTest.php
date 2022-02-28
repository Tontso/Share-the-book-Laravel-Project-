<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use DatabaseMigrations; // Because of the id. Using RefreshDatabase id start from 12....

    public function test_login_redirect_to_dashboard_successfully()
    {
        User::factory()->create([
            'email' => 'cs03167@test.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login', [
            'email' => 'cs03167@test.com',
            'password' => 'password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_dasboard()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauth_user_cannot_see_insert_form_a_book()
    {
        $response = $this->get('/books/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unath_user_cannot_see_user_books()
    {
        $response = $this->get('/1/books');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauth_user_cannot_register_book()
    {
        $response = $this->post('/books');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauth_user_cannot_see_a_book()
    {
        $response = $this->get('/books/2');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_unauth_user_cannot_see_edit_form_book()
    {
        $response = $this->get('/books/2/edit');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }


    public function test_auth_user_can_see_his_own_one_books()
    {

        // $user = User::factory()->has(Book::factory(1))->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->call('GET', '/1/books', ['books' => $user->books])->assertStatus(200);

        $book = Book::factory(1)->create(['title' => 'TestTitle', 'user_id' => $user]);
        $this->assertDatabaseCount('users', 1); // To make sure that threre is not other user!
        $this->assertDatabaseCount('books', 1); // To make sure that threre is not other user!

        dd($user->books);
        // $response = $this->actingAs($user)->call('GET', '/1/books', ['books' => $user->books])->assertStatus(200); There is a problem if it is here
        // The id is 1 because I have ensued that there is only one user in the db!
        $response->assertSee('TestTitle');
        // $response = $this->actingAs($user)->get('/1/books');
        // $response->assertStatus(200);
        // // var_dump($usertwo);

        // // $response->assertStatus(200);
        // $this->assertDatabaseCount('users', 1);
    }


    /**
     * make: dont keep the model in database!
     */
    public function test_auth_user_can_see_his_all_books()
    {

        $user = User::factory()->create();
        // $genre = Genre::factory()->create();
        $book = Book::factory()->create(['title' => 'TestBook-1', 'genre_id' => '1', 'user_id' => $user->id]);
        $book = Book::factory()->create(['title' => 'TestBook-2', 'genre_id' => '2', 'user_id' => $user->id]);
        $book = Book::factory()->create(['title' => 'TestBook-3', 'genre_id' => '1', 'user_id' => $user->id]);

        $books = ['TestBook-1', 'TestBook-2', 'TestBook-3', 'Test-4'];

        $response = $this->actingAs($user)->get('/books');
        $response->assertSeeTextInOrder(['den ginete!']);
    }
}
