<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNameForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.category.create')
                ->assertRouteIs('admin.category.create')
                ->assertSee('Форма для добавление категории')

                ->press('Добавить')
                ->assertSee('Поле Название обязательно для заполнения.')

                ->type('name', 'Хайп')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Название должно быть не менее 5.');
        });
    }

    public function testSlugForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.category.create')
                ->assertRouteIs('admin.category.create')
                ->assertSee('Форма для добавление категории')

                ->press('Добавить')
                ->assertSee('Поле Псевдоним обязательно для заполнения.')

                ->type('slug', 'gg')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Псевдоним должно быть не менее 3.')

                ->type('slug', 'antidisestablishmentarianism')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Псевдоним не может превышать 15.');
        });
    }

}
