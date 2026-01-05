<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccessTest extends TestCase
{
    /**
     * Skenario 1: Admin memasukkan password yang BENAR.
     * Expect: Redirect ke /admin dan session tercatat.
     */
    public function test_admin_can_access_dashboard_with_correct_password()
    {
        // Password sesuai logic di routes/web.php baris 94
        $response = $this->post('/admin-verification', [
            'password' => 'Adminniboss', 
        ]);

        $response->assertRedirect('/admin');
        $response->assertSessionHas('admin_password_verified', true);
    }

    /**
     * Skenario 2: Admin memasukkan password yang SALAH.
     * Expect: Redirect kembali ke / dengan error.
     */
    public function test_admin_cannot_access_dashboard_with_wrong_password()
    {
        $response = $this->post('/admin-verification', [
            'password' => 'salahpassword',
        ]);

        // Sesuai logic di routes/web.php baris 99
        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Password salah!');
    }
}