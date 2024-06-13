<?php

namespace App\Controller;

use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ReviewApproveController extends AbstractController
{
    #[Route('/reviews/inwaiting', name: 'review_inwaiting')]
    #[IsGranted(['ROLE_USER', 'ROLE_ADMIN'])]
    public function listInWaitingReviews(EntityManagerInterface $entityManager): Response
    {
        $reviews = $entityManager->getRepository(Review::class)->findBy(['approved' => false]);

        return $this->render('review_approval/inwaiting.html.twig', [
            'reviews' => $reviews,
        ]);
    }

    #[Route('/reviews/approve/{id}', name: 'review_approve', methods: ['POST'])]
    #[IsGranted(['ROLE_USER', 'ROLE_ADMIN'])]
    public function approveReview(int $id, EntityManagerInterface $entityManager): Response
    {
        $review = $entityManager->getRepository(Review::class)->find($id);

        if ($review) {
            $review->setApproved(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('review_inwaiting');
    }
}
