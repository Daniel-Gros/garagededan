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
        $carLimit = $parameterBagInterface->get('home_car_limit');
        $cars = $carRepository->findBy([], ['id' => 'DESC'], $carLimit);
        $serviceLimit = $parameterBagInterface->get('home_service_limit');
        $service = $serviceRepository->findBy([], ['id' => 'DESC'], $serviceLimit);
        $review = $reviewRepository->findBy([], ['id' => 'DESC']);

        $websiteName = 'Garage Vincent Parrot';
        return $this->render('page/index.html.twig', [
            'websiteName' => $websiteName,
            'cars' => $cars,
            'service' => $service,
            'review' => $review,
        ]);
    }
}
