<?php

namespace Tests\Feature;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
//        $response->assertSee('<a class="nav-link active" href="http://laravel.local">Главная</a>');
        $response->assertSeeText('Добро пожаловать');
        $response->assertSeeInOrder(['active', 'Главная', 'Новости']);
        $response->assertSeeInOrder(['Главная', 'Новости', 'Категории', 'Админка']);

    }

    public function testNewsIndexTest()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
//        $response->assertSee('<a class="nav-link active" href="http://laravel.local">Главная</a>');
        $response->assertSeeInOrder(['Главная', 'active', 'Новости']);
        $response->assertSeeInOrder(['Главная', 'Новости', 'Категории', 'Админка']);
        $response->assertViewHas('news', News::getNews());
        $response->assertViewIs('news.index');

    }
}
