<?php

namespace App\Controller;

use App\Form\ReviewType;
use App\Repository\CarRepository;
use App\Repository\ReviewRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository, ParameterBagInterface $parameterBagInterface, ServiceRepository $serviceRepository, ReviewRepository $reviewRepository): Response
    {
        $carLimit = $parameterBagInterface->get('home_car_limit'); // limite de 3 voitures
        $cars = $carRepository->findBy([], ['id' => 'DESC'], $carLimit, 0, ['id', 'name', 'model', 'year']);    
        // $service = $serviceRepository->findBy([], ['id' => 'DESC'], $serviceLimit); => option pour paramétrer l'affichage de 3 services pour le rendu visuel de 3 cards comme pour les cards véhicules plus haut dans la page, au lieu de tous si Mr Parrot le décide.
        $service = $serviceRepository->findAll();
        $reviewLimit = $parameterBagInterface->get('review_limit'); // limite de 3 avis
        $review = $reviewRepository->findBy([], ['id' => 'DESC'], $reviewLimit , 0, ['nickname', 'message', 'score']);

        $websiteName = 'Garage Vincent Parrot';
        return $this->render('page/index.html.twig', [
            'websiteName' => $websiteName,
            'cars' => $cars,
            'service' => $service,
            'review' => $review,
        ]);
    }
}
