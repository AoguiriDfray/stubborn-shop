<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CheckoutTest extends WebTestCase
{
    public function testCartSuccessPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cart/success');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Paiement réussi');
    }

    public function testCartCancelPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cart/cancel');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Paiement annulé');
    }
}