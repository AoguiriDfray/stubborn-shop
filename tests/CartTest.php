<?php

namespace App\Tests;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartTest extends WebTestCase
{
    public function testCartPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cart');

        $this->assertResponseIsSuccessful();
    }

    public function testProductsPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/products');

        $this->assertResponseIsSuccessful();
    }

    public function testAddToCartRouteRedirects(): void
    {
        $client = static::createClient();

        $productRepository = static::getContainer()->get(ProductRepository::class);
        $product = $productRepository->findOneBy([]);

        $this->assertNotNull($product, 'Aucun produit trouvé dans la base de test.');

        $client->request('POST', '/cart/add/' . $product->getId(), [
            'size' => 'M',
        ]);

        $this->assertResponseRedirects('/cart');
    }

    public function testCartRemoveRouteRedirects(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cart/remove/0');

        $this->assertResponseRedirects('/cart');
    }
}