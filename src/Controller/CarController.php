<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/showcar', name: 'app_showcar')]
    public function index(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findall([], ['id' => 'DESC'] );
        // requête de test Postman
        // $data = [];
        // foreach ($cars as $car) {
        //     $data[] = [
        //         'id' => $car->getId(),
        //         'year' => $car->getYear()->format('Y'),
        //         'price' => $car->getPrice(),
        //         'kilometers' => $car->getKilometers(),
        //     ];
        // }
        // return new JsonResponse($data);
        return $this->render('car/index.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('/car/{id}', name: 'app_car')]
    public function show($id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        return $this->render('car/showcar.html.twig', [
            'car' => $car,
        ]);
    }
}
