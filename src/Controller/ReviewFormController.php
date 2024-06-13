<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewFormController extends AbstractController
{
    #[Route('/reviewform', name: 'app_review_form')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $review = new Review();

        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($review);
            $entityManager->flush();

            return $this->redirectToRoute('review_list');
        }

        return $this->render('review_form/index.html.twig', [
            'form' => $form->createView(),
            'allow_extra_fields' => true,
        ]);
    }
}
