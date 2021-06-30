<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestDetailController extends AbstractController
{
    #[Route('/tests/{id}', name: 'test-detail')]
    public function index(int $id): Response
    {
        return $this->render('test-detail/testDetailView.html.twig', [
            'navTitle' => 'DÉTAIL DU TEST'
        ]);
    }
}
