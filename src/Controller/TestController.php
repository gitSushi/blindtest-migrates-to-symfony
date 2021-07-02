<?php

namespace App\Controller;

use Acme\Form\Type\DatalistType;
use App\Entity\TestGroup;
use App\Repository\TestGroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testgroup/form', name: 'testgroup-form')]
    public function index(TestGroupRepository $tgRepo): Response
    {
        $testGroup = new TestGroup();
        $form = $this->createFormBuilder($testGroup)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('Sauvegarder', SubmitType::class, ['label' => 'Sauvegarder'])
            ->getForm();

        return $this->render('test-group/testGroup.html.twig', [
            'navTitle' => 'CRÉATION DE GROUPE DE TESTS',
            'products' => $tgRepo->findAll(),
            'form' => $form->createView(),
        ]);
    }

    #[Route('/testgroup/create', name: 'testgroup-create')]
    public function createTest(): Response
    {
        return $this->render('test-group/testUnique.html.twig', [
            'navTitle' => 'CRÉATION DE TESTS',
        ]);
    }
}
