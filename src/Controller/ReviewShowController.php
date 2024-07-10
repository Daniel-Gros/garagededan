<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewShowController extends AbstractController
{
    #[Route('/review/show', name: 'app_review_show')]
    public function showReview(ReviewRepository $reviewRepository): Response
    {
        $approvedReview = $reviewRepository->findApprovedReviews();
        dump($approvedReview);

        return $this->render('review/index.html.twig', [
            'reviews' => $approvedReview,
        ]);
    }
}
