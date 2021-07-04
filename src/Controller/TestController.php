<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\TestGroup;
use App\Form\Type\DatalistType;
use App\Repository\TestGroupRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testgroup/form', name: 'testgroup-form')]
    public function index(TestGroupRepository $tgRepo, Request $request): Response
    {
        $testGroup = new TestGroup();

        // ->setAction($this->generateUrl('testgroup-create'))
        $form = $this->createFormBuilder($testGroup)
            ->add('product', DatalistType::class, ['choices' => $tgRepo->findAll(), 'label' => false])
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('Sauvegarder', SubmitType::class, ['label' => 'Sauvegarder'])
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            $form->handleRequest($request);
            $testGroup = $form->getData();
            var_dump($testGroup);

            // return $this->redirectToRoute('testgroup-create');
        }

        return $this->render('test-group/tGrp.html.twig', [
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

    #[Route('/testtest', name: 'testtest')]
    public function testTest(Request $request): Response
    {
        $testGrp = new TestGroup();

        $emp = new Employee();
        $emp->setFirstname('BOB');
        $testGrp->getEmployee()->add($emp);

        $form = $this->createFormBuilder($testGrp)
            ->add('employee', CollectionType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            $form->handleRequest($request);
            $testGrp = $form->getData();
            var_dump($testGrp);

            // return $this->redirectToRoute('testgroup-create');
        }

        return $this->render('test-group/testtest.html.twig', [
            'navTitle' => 'TEST DE TESTS',
            'form' => $form->createView()
        ]);
    }
}
