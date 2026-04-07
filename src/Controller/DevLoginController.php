<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class DevLoginController extends AbstractController
{
    #[Route('/force-login-admin', name: 'app_force_login_admin')]
    public function forceLoginAdmin(
        Request $request,
        UserRepository $userRepository,
        UserAuthenticatorInterface $userAuthenticator,
        LoginFormAuthenticator $authenticator
    ): Response {
        $user = $userRepository->findOneBy(['email' => 'admin@test.com']);

        if (!$user) {
            return new Response('Utilisateur admin@test.com introuvable.');
        }

        return $userAuthenticator->authenticateUser(
            $user,
            $authenticator,
            $request
        );
    }
}