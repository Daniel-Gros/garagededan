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
        $subject = ''; 


        if ($request->query->has('from_card')) {
            $subject = 'Renseignement sur la vente du véhicule numéro d\'annonce: '. $carId;
        } elseif ($request->query->has('service_id')) {

            $services = [
                1 => 'Carosserie et Peinture',
                2 => 'Petit entretien',
                3 => 'Remplacement ou réparation du parebrise',
                4 => 'Démarches administratives',
                5 => 'Réparation importante et gros oeuvre',
            ];

            $serviceName = isset($services[$serviceId])? $services[$serviceId] : 'Service non reconnu';

            $subject = 'Renseignement sur notre service: "'. $serviceName. '"';
        }

        $form = $this->createForm(ContactType::class, null, [
            'subject' => $subject,
            'car_id' => $carId,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g., send an email or save to database
            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
