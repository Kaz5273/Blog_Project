<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Blog Project - Admin')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user-circle', User::class);
        yield MenuItem::linkToCrud('Project', 'fa fa-id-card-o', Project::class);
        yield MenuItem::linkToRoute('blog', 'fa fa-repeat', 'app_project_index');
    }

}
