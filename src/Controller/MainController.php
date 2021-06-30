<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'menu')]
    public function index(): Response
    {
        return $this->render('menu.html.twig', [
            'navTitle' => 'MENU',
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        return $this->render('logout.html.twig', [
            'navTitle' => 'LOGOUT',
        ]);
    }
}
