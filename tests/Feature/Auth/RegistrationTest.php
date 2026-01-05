<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_registration_fails_if_name_is_empty(): void
    {
        // Mencoba register tanpa nama
        $response = $this->post('/register', [
            'name' => '', // Kosong
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Memastikan ada error di session pada key 'name'
        $response->assertSessionHasErrors('name');
    }

    public function test_registration_fails_if_email_is_invalid(): void
    {
        // Mencoba register dengan format email salah
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'bukan-email', // Format salah
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
