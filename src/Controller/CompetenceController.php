<?php

namespace App\Controller;

use App\Entity\Framework;
use App\Entity\Year;
use App\Repository\FrameworkRepository;
use App\Repository\LanguageRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    #[Route('/competence', name: 'app_competence')]
    public function competence(YearRepository $yearRepository, LanguageRepository $languageRepository, FrameworkRepository $frameworkRepository): Response
    {
        $languageList = $languageRepository->findBy([], ['xp' => 'DESC']);
        $frameworkList = $frameworkRepository->findBy([], ['xp' => 'DESC'],4);
        $valueNext = $yearRepository->findOneBy([], ['id' => 'DESC']);
        $valuePrev = $yearRepository->findBy([], ['id' => 'DESC'], 2);
       
          $lastYearNumber = $valueNext->getNumber();
          $lastValue = $valueNext->getValue();
          $beforeYearNumber = $valuePrev[1]->getNumber();
          $beforeValue = $valuePrev[1]->getValue();
        

        return $this->render('competence/competence.html.twig', [
            'controller_name' => 'CompetenceController',
            'lastYearNumber' => $lastYearNumber,
            'lastValue' => $lastValue,
            'beforeYearNumber' => $beforeYearNumber,
            'beforeValue' => $beforeValue,
            'languageList' => $languageList,
            'frameworkList' => $frameworkList,
        ]);
    }
}
