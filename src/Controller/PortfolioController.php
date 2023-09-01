<?php

namespace App\Controller;

use Twig\Environment;
use App\Data\SearchData;
use App\Form\SearchDataType;
use App\Repository\ProjetRepository;
use App\Repository\LanguageRepository;
use App\Repository\FrameworkRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'app_portfolio', methods: ['GET'])]
    public function index(Request $request, LanguageRepository $languageRepository, ProjetRepository $projetRepository): Response
    {
        $searchData = new SearchData();
        $form = $this->createForm(SearchDataType::class, $searchData);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
           
        // Récupérer l'objet Language à partir des données du formulaire
        $selectedLanguage = $searchData->getLanguage();
    
        // Récupérer l'ID du langage sélectionné
        $selectedLanguageId = $selectedLanguage->getId();

        // Récupérer les projets associés au langage sélectionné
        $projetList = [];
        if ($selectedLanguage) {
            $projetList = $projetRepository->findByLanguageId($selectedLanguageId);
        }
        }else{
            $projetList = $projetRepository->findAll();
            
        }
        return $this->render('portfolio/portfolio.html.twig', [
            'form' => $form->createView(),
            'projetList' => $projetList,
        ]);
    }


#[Route('/portfolio/update/{languageId}', name: 'update_portfolio', methods: ['GET'])]
public function updateProjects($languageId, ProjetRepository $projetRepository, Environment $twig): Response
{
    // Utilisez $languageId pour récupérer les projets correspondants à cette langue
    $projetListUpdate = $projetRepository->findByLanguageId($languageId);

    // Vous pouvez également créer un modèle Twig pour générer la liste des projets
    $html = $twig->render('portfolio/portfolio.update.html.twig', [
        'projetListUpdate' => $projetListUpdate,
    ]);

    // Créez une réponse avec le HTML généré
    $response = new Response($html);

    // Assurez-vous de définir les en-têtes de la réponse pour éviter la mise en cache par le navigateur
    $response->headers->set('Content-Type', 'text/html');
    $response->headers->set('Cache-Control', 'no-store, private');

    return $response;
}


}
