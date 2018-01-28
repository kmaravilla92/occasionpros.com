<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BackofficeLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdminLoginPageVisibility()
    {
        $this->visit('/admin/login');
        $response = $this->call('GET' ,'/admin/login');
        $this->assertResponseOk();
        $this->assertEquals(200, $response->status());
    }

    public function testAdminLoginWithCorrectCredentials()
    {
        $this->visit('/admin/login')
                ->type('kim@happyweekend.com','email')
                ->type('password','password')
                ->check('remember_me')
                ->press('login')
                ->see('/admin');
    }

    public function testAdminLoginWithWrongCredentials()
    {
        $this->visit('/admin/login')
                ->type('s0me_invalid*user@email.wrong','email')
                ->type('AYellowStickyNotes','password')
                ->check('remember_me')
                ->press('login')
                ->see('/admin/login');
    }
}
