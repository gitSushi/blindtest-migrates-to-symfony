<?php

namespace App\Controller;

use App\Repository\TestGroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testgroup/form', name: 'testgroup-form')]
    public function index(TestGroupRepository $tgRepo): Response
    {
        var_dump($tgRepo->getNativeHistory());

        return $this->render('test-group/testGroup.html.twig', [
            'navTitle' => 'CRÉATION DE TESTS',
            'tests' => 'test',
        ]);
    }
}
