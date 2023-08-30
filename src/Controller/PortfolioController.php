<?php

namespace App\Controller;

use App\Repository\FrameworkRepository;
use App\Repository\LanguageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'app_portfolio')]
    public function index(LanguageRepository $languageRepository, FrameworkRepository $frameworkRepository): Response
    {
        $languageList = $languageRepository->findAll();
       

        



        return $this->render('portfolio/portfolio.html.twig', [
            'controller_name' => 'PortfolioController',
            'languageList' => $languageList,
        ]);
    }
}
