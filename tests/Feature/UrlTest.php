<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    protected $id;

    protected function setUp(): void
    {
        parent::setUp();
        $name = 'https://test.com';
        DB::table('urls')->insert(
            [
                'name' => $name,
            ]
        );
        $this->id = optional(DB::table('urls')
            ->where('name', $name)
            ->first())->id;
    }

    public function testHome(): void
    {
        $response = $this->get(route('/.home'));
        $response->assertOk();
    }

    public function testIndex(): void
    {

        $response = $this->get(route('urls.index'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'https://yandex.ru'];
        $request = ['url' => $data];
        $response = $this->post(route('urls.store'), $request);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('urls', $data);
    }

    public function testShow(): void
    {
        $response = $this->get(route('urls.show', $this->id));
        $response->assertOk();
    }
}
