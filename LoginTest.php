<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testLoginError()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'abc@qwe.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/login')
                ->assertSee('These credentials do not match our records.');
        });
    }

    public function testLoginSuccess()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::first())
                ->visit('/home')
                ->assertPathIs('/home')
                ->assertSee('18 horas e 10 minutos em 12 aulas para você ir para outro patamar profissional.');
        });
    }

    public function testViewvideoPage()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::first())
                ->visit('/home')
                ->assertPathIs('/home')
                ->assertSee('18 horas e 10 minutos em 12 aulas para você ir para outro patamar profissional.')
                ->clickLink('Assistir Videos')
                ->assertPathIs('/videos');
        });
    }
}
