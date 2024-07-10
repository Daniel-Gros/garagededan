<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Car;
use App\Entity\Color;
use App\Entity\Contact;
use App\Entity\DinPower;
use App\Entity\Door;
use App\Entity\Energy;
use App\Entity\Model;
use App\Entity\Power;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\Sit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardEmployeeController extends AbstractDashboardController
{
    #[Route('/employeeadmin', name: 'employeeadmin')]
    public function index(): Response
    {
        return $this->render('admin/employee.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //


    }

    // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
    // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
    //
    // return $this->render('some/path/my-dashboard.html.twig');


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Panneau Administrateur Garage Vincent Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Véhicules', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Marques de véhicule', 'fas fa-flag', Brand::class);
        yield MenuItem::linkToCrud('Modèles de véhicule', 'fas fa-star', Model::class);
        yield MenuItem::linkToCrud('Carburant', 'fas fa-gas-pump', Energy::class);
        yield MenuItem::linkToCrud('Couleur', 'fas fa-palette', Color::class);
        yield MenuItem::linkToCrud('Nombre de portes', 'fas fa-door-closed', Door::class);
        yield MenuItem::linkToCrud('Nombre de sièges', 'fas fa-chair', Sit::class);
        yield MenuItem::linkToCrud('Puissance moteur', 'fas fa-horse-head', Power::class);
        yield MenuItem::linkToCrud('Puissance fiscale (DIN)', 'fas fa-money-bill', DinPower::class);
        yield MenuItem::linkToCrud('Avis clients', 'fas fa-comments', Review::class);
        yield MenuItem::linkToCrud('Message de contact', 'fas fa-envelope', Contact::class);
        yield MenuItem::linkToUrl('Voir le site', 'fa fa-eye', $this->generateUrl('app_home'));
    }
}
