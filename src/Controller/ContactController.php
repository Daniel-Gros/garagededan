<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        $carId = $request->query->get('car_id');
        $serviceId = $request->query->get('service_id'); 

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g., send an email or save to database
            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
            'car_id' => $carId,
            'service_id' => $serviceId,
        ]);
    }
}

