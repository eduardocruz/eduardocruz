<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AulaTest extends DuskTestCase
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
                    ->assertSee('Upgrade Profissional para Devs');
        });
    }

    public function testGoHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertPathIs('/login');
        });
    }

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertPathIs('/login')
                ->type('email', 'qweqew@qwewe.com')
                ->type('password', 'sdkfjhskdfjh')
                ->press('Login')
                ->assertSee('Whoops! Something went wrong!')
                ->assertSee('These credentials do not match our records.');
        });
    }

    public function testLoginSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                ->visit('/home')
                ->assertPathIs('/home')
                ->assertDontSee('Whoops! Something went wrong!')
                ->assertDontSee('These credentials do not match our records.')
                //->assertTitle('Videos')
                ->assertSee('Dashboard - 8 horas e 10 minutos em 12 aulas para você ir para outro patamar profissional.')
                ->clickLink('Assistir Videos')
                ->assertPathIs('/videos');
        });
    }

}
