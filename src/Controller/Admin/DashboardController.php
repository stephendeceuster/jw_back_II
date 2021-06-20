<?php

namespace App\Controller\Admin;

use App\Entity\PhotoCases;
use App\Entity\PhotoCategories;
use App\Entity\WoodCases;
use App\Entity\WoodCategories;
use App\Entity\WoodTypes;
use App\Entity\Users;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img width="60%" src="/logo/JorneWellens-zwart.svg">');
    }

    public function configureMenuItems(): iterable
    {
        return [  
            //MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
    
            MenuItem::section('Photo'),
            MenuItem::linkToCrud('Cases', 'fa fa-tags', PhotoCases::class),
            MenuItem::linkToCrud('Categories', 'fa fa-file-text', PhotoCategories::class),

            MenuItem::section('Wood'),
            MenuItem::linkToCrud('Cases', 'fa fa-tags', WoodCases::class),
            MenuItem::linkToCrud('Categories', 'fa fa-file-text', WoodCategories::class),
            MenuItem::linkToCrud('Types', 'fa fa-file-text', WoodTypes::class),
    
            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', Users::class),
            
            MenuItem::linkToLogout('Logout', 'fa fa-exit')
        ];
    }
}
