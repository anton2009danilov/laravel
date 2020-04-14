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
                    ->assertSee('Добро пожаловать'); //тест работает везде и в консоли и в phpstorm
//                    ->visitRoute('admin.news.create')
//                    ->assertSee('Show');
                    // Эти ^^^^ и другие тесты не проходят в консоли phpstorm и консоли виртуальной машины.
        });
    }
}
