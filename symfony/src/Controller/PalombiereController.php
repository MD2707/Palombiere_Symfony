<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalombiereController extends AbstractController
{
    #[Route('/palombiere', name: 'app_palombiere')]
    public function index(): Response
    {
        return $this->render('palombiere/index.html.twig', [
            'controller_name' => 'PalombiereController',
        ]);
    }
}
