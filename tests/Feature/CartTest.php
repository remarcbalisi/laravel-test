<?php

namespace Tests\Feature;

use App\Cart;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewCart()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAddToCart()
    {
        $this->withoutExceptionHandling();

        $product = factory(Product::class)->create();

        $this->get("cart/{$product->id}")
            ->assertSessionHas('cart', [
                $product->id => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1
                ]
            ]);
    }

    public function testCanAddQuantity()
    {
        $this->withoutExceptionHandling();

        $product = factory(Product::class)->create();

        $cart = (new Cart())->add($product);

        $response = $this->get("cart/{$product->id}");

        $response->assertSessionHas('cart', [
            $product->id => [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 2
            ]
        ]);


    }
}
