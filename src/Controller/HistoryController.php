<?php

namespace App\Controller;

use App\Repository\TestGroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
    #[Route('/history', name: 'history')]
    public function index(TestGroupRepository $tgRepo): Response
    {
        return $this->render('history/history.html.twig', [
            'navTitle' => 'HISTORIQUE',
            'datas' => $tgRepo->getNativeHistory(),
        ]);
    }

    // public function index(): Response
    // {
    //     return $this->render('history/history.html.twig', [
    //         'navTitle' => 'HISTORIQUE',
    //         'datas' => [
    //             [
    //                 'test_group_id' => 1,
    //                 'has_product_passed_test' => 1,
    //                 'name' => 'Bob\'s Orgy',
    //                 'reference_employee' => '69',
    //                 'pname' => 'leather mask'
    //             ],
    //             [
    //                 'test_group_id' => 2,
    //                 'has_product_passed_test' => 0,
    //                 'name' => 'You\'re my meal',
    //                 'reference_employee' => '37',
    //                 'pname' => 'tigress'
    //             ]
    //         ]
    //     ]);
    // }
}
