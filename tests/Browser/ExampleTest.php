<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Добро пожаловать');
//                    ->visitRoute('admin.news.create')
//                    ->assertSee('Show'); Это не работает на виртуальной машине, тесты форм тоже не работают там.
        });
    }
}
