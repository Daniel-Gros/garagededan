<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/reviews', name: 'app_reviews')]
    public function index(ReviewRepository $reviewRepository): Response
    {
        $approvedReviews = $reviewRepository->findLatestApprovedReviews();

        return $this->render('review/index.html.twig', [
            'reviews' => $approvedReviews,
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

    #[Route('/review/new', name: 'app_review_new')]
public function new(Request $request): Response
{
    $review = new Review();
    $review->setStatus('pending'); // Initial status set to 'pending'

    $form = $this->createForm(ReviewType::class, $review);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->entityManager;
        $entityManager->persist($review);
        $entityManager->flush();
        
        $this->addFlash('success', 'Des avis sont en attente de validation.');
    
        return $this->redirectToRoute('app_home');
    }

    $formView = $form->createView();
    
    return $this->render('review_form/index.html.twig', [
        'form' => $formView,
    ]);
}

}
