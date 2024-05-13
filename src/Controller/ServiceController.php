<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/showservice', name: 'app_showservice')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findBy([], ['id' => 'DESC']);

        return $this->render('service/index.html.twig', [
            'services' => $services,
        ]);
    }
}
