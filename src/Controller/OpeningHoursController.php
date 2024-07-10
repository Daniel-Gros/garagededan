<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use App\Repository\OpeningHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class OpeningHoursController extends AbstractController
{
    #[Route('/opening-hours', name: 'opening_hours')]
    public function index(OpeningHoursRepository $openingHoursRepository): Response
    {
        $openingHours = $openingHoursRepository->findAll();

        return $this->render('opening_hours/index.html.twig', [
            'openingHours' => $openingHours,
        ]);
    }
}

