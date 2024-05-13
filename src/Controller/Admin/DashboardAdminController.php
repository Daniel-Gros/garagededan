<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Car;
use App\Entity\Color;
use App\Entity\DinPower;
use App\Entity\Door;
use App\Entity\Energy;
use App\Entity\Model;
use App\Entity\Power;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\Sit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this ->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

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
        yield MenuItem::linkToCrud('Service', 'fas fa-bell-concierge', Service::class);
        yield MenuItem::linkToCrud('Avis clients', 'fas fa-list', Review::class);
        yield MenuItem::linkToCrud('Compte employé', 'fas fa-person', User::class);
    }
}
