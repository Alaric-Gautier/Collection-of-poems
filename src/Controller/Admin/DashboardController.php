<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Poem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(PoemCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Reminiscence');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('Poems', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All poems', 'fas fa-newspaper', Poem::class),
            MenuItem::linkToCrud('Add', 'fas fa-plus', Poem::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class),
            MenuItem::linkToCrud('Add', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW)
        ]);
    }
}
