<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
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

    #[Route('/review', name: 'review_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $reviews = $entityManager->getRepository(Review::class)->findAll();

        return $this->render('review/list.html.twig', [
            'reviews' => $reviews,
        ]);
    }
}
