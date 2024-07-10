<?php

namespace App\Controller;

use App\Form\CarFilterType;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/showcar', name: 'app_showcar')]
    public function list(Request $request, CarRepository $carRepository): Response
    {
            $form = $this->createForm(CarFilterType::class);
            $form->handleRequest($request);
    
            $criteria = $form->getData() ?? [];
    
            $cars = $carRepository->findByCriteria($criteria);
    
            if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
                return $this->json([
                    'cars' => $cars,
                ]);
            }
    
            return $this->render('car/index.html.twig', [
                'form' => $form->createView(),
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
