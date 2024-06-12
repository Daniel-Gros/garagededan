<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewController extends AbstractController
{
    #[Route('/review', name: 'app_review')]
    public function index(): Response
    {
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
        ]);
    }

    #[Route('/review/{id}', name: 'app_review_show')]
    public function randomview(ReviewRepository $reviewRepository): Response
    {

        $randomView = $reviewRepository->findRandomReview();

        if (!$randomView) {
            throw $this->createNotFoundException('Aucun avis trouvé');
        }

        return $this->render('review/show.html.twig', [
            'randomView' => $randomView,
        ]);
    }

    #[Route('/reviewcreation', name: 'app_review_create')]
    public function create(): Response
    {
        return $this->render('review/_form.html.twig', [
            'controller_name' => 'ReviewController',
        ]);
    }
}
