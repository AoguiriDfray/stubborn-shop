<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\StripeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(RequestStack $requestStack, ProductRepository $productRepository): Response
    {
        $session = $requestStack->getSession();
        $cart = $session->get('cart', []);

        $cartData = [];
        $total = 0;

        foreach ($cart as $item) {
            $product = $productRepository->find($item['id']);

            if ($product) {
                $cartData[] = [
                    'product' => $product,
                    'size' => $item['size'],
                ];

                $total += $product->getPrice();
            }
        }

        return $this->render('cart/index.html.twig', [
            'items' => $cartData,
            'total' => $total,
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add', methods: ['POST'])]
    public function add(int $id, RequestStack $requestStack, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Produit introuvable.');
        }

        $session = $requestStack->getSession();
        $cart = $session->get('cart', []);
        $size = $_POST['size'] ?? 'M';

        $cart[] = [
            'id' => $id,
            'size' => $size,
        ];

        $session->set('cart', $cart);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove/{index}', name: 'app_cart_remove')]
    public function remove(int $index, RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        $cart = $session->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart);
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/checkout', name: 'app_cart_checkout', methods: ['POST'])]
    public function checkout(
        RequestStack $requestStack,
        ProductRepository $productRepository,
        StripeService $stripeService
    ): Response {
        $session = $requestStack->getSession();
        $cart = $session->get('cart', []);

        $cartData = [];

        foreach ($cart as $item) {
            $product = $productRepository->find($item['id']);

            if ($product) {
                $cartData[] = [
                    'product' => $product,
                    'size' => $item['size'],
                ];
            }
        }

        if (empty($cartData)) {
            return $this->redirectToRoute('app_cart');
        }

        $checkoutSession = $stripeService->createCheckoutSession(
            $cartData,
            'http://127.0.0.1:8000/cart/success',
            'http://127.0.0.1:8000/cart/cancel'
        );

        return $this->redirect($checkoutSession->url);
    }

    #[Route('/cart/success', name: 'app_cart_success')]
    public function success(RequestStack $requestStack): Response
    {
        $requestStack->getSession()->remove('cart');

        return new Response('<h1>Paiement réussi</h1><a href="/">Retour à l\'accueil</a>');
    }

    #[Route('/cart/cancel', name: 'app_cart_cancel')]
    public function cancel(): Response
    {
        return new Response('<h1>Paiement annulé</h1><a href="/cart">Retour au panier</a>');
    }
}