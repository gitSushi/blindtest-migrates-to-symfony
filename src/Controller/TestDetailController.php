<?php

namespace App\Controller;

use App\Repository\TestDetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestDetailController extends AbstractController
{
    #[Route('/tests/{id}', name: 'test-detail')]
    public function index(int $id, TestDetailRepository $tdr): Response
    {
        return $this->render('test-detail/testDetail.html.twig', [
            'navTitle' => 'DÉTAIL DU TEST',
            'tests' => $tdr->getDetails($id)
        ]);
    }
}
