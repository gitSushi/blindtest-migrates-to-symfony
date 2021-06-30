<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(): Response
    {
        return $this->render('products/products.html.twig', [
            'navTitle' => 'PRODUCTS',
        ]);
    }
}