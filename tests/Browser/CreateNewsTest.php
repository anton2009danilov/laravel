<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNewsTest extends DuskTestCase
{
//    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testTitleForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->assertRouteIs('admin.news.create')

                    ->assertSee('Форма для добавление новости')
                    ->press('Добавить')
                    ->assertSee('Поле Заголовок обязательно для заполнения')

                    ->type('title', 'New')
                    ->press('Добавить')
                    ->assertSee('Количество символов в поле Заголовок должно быть не менее 5.')

                    ->type('title', 'В Россию доставили штамм коронавируса из США!!!!!!!')
                    ->press('Добавить')
                    ->assertSee('Количество символов в поле Заголовок не может превышать 25.');
        });
    }

    public function testNewsCreationSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'Всё будет хорошо.')
                ->type('text', 'Всё закончится, всё будет хорошо. Заживём лучше прежнего. Гарантия 100%.')
                ->select('category_id', '3')
                ->assertSee('Добрые новости')
                ->press('Добавить')
                ->assertSee('Новость успешно добавлена.');
        });
    }
}
