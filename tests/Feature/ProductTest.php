<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewProducts()
    {
        $product = factory('App\Product')->create();

        $this->get('products')
            ->assertViewHas('products')
            ->assertSeeText($product->name);
    }
}
