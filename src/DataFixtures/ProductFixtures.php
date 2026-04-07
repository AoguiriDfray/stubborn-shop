<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $products = [
            [
                'name' => 'Blackbelt',
                'description' => 'Sweat-shirt noir confortable et moderne.',
                'price' => 29.90,
                'stock' => 10,
                'image' => '1.jpeg',
                'size' => 'M',
                'isFeatured' => true,
            ],
            [
                'name' => 'BlueBelt',
                'description' => 'Sweat-shirt bleu intemporel.',
                'price' => 29.90,
                'stock' => 10,
                'image' => '2.jpeg',
                'size' => 'M',
                'isFeatured' => true,
            ],
            [
                'name' => 'Street',
                'description' => 'Sweat-shirt orange streetwear.',
                'price' => 34.50,
                'stock' => 10,
                'image' => '3.jpeg',
                'size' => 'M',
                'isFeatured' => false,
            ],
            [
                'name' => 'Pokeball',
                'description' => 'Sweat-shirt original orange et blanc.',
                'price' => 45.00,
                'stock' => 10,
                'image' => '4.jpeg',
                'size' => 'M',
                'isFeatured' => false,
            ],
            [
                'name' => 'PinkLady',
                'description' => 'Sweat-shirt rose stylé.',
                'price' => 29.90,
                'stock' => 10,
                'image' => '5.jpeg',
                'size' => 'S',
                'isFeatured' => false,
            ],
            [
                'name' => 'Snow',
                'description' => 'Sweat-shirt beige clair.',
                'price' => 32.00,
                'stock' => 10,
                'image' => '6.jpeg',
                'size' => 'M',
                'isFeatured' => false,
            ],
            [
                'name' => 'Greyback',
                'description' => 'Sweat-shirt gris classique.',
                'price' => 28.50,
                'stock' => 10,
                'image' => '7.jpeg',
                'size' => 'L',
                'isFeatured' => false,
            ],
            [
                'name' => 'BlueCloud',
                'description' => 'Sweat-shirt bleu vif.',
                'price' => 45.00,
                'stock' => 10,
                'image' => '8.jpeg',
                'size' => 'M',
                'isFeatured' => false,
            ],
            [
                'name' => 'BornInUsa',
                'description' => 'Sweat-shirt imprimé gris.',
                'price' => 59.90,
                'stock' => 10,
                'image' => '9.jpeg',
                'size' => 'XL',
                'isFeatured' => true,
            ],
            [
                'name' => 'GreenSchool',
                'description' => 'Sweat-shirt vert universitaire.',
                'price' => 42.00,
                'stock' => 10,
                'image' => '10.jpeg',
                'size' => 'L',
                'isFeatured' => false,
            ],
        ];

        foreach ($products as $data) {
            $product = new Product();
            $product->setName($data['name']);
            $product->setDescription($data['description']);
            $product->setPrice($data['price']);
            $product->setStock($data['stock']);
            $product->setImage($data['image']);
            $product->setSize($data['size']);
            $product->setIsFeatured($data['isFeatured']);

            $manager->persist($product);
        }

        $manager->flush();
    }
}