<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\Project;
use App\Entity\Reference;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly ChartBuilderInterface $chartBuilder
    )
    {}

    public function index(): Response
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
            'datasets' => [
                [
                    'label' => 'Ventes',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [12, 19, 3, 5, 2, 3],
                ],
                [
                    'label' => 'Dépenses',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [8, 11, 7, 6, 4, 9],
                ],
            ],
        ]);

        $chart->setOptions([
            'responsive' => true,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ]);

        return $this->render('admin/dashboard.html.twig', [
            'chart' => $chart,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<div class="d-flex justify-content-center align-items-center"><img src="/build/images/favicon/favicon.svg"></div>')
            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('/build/images/favicon/favicon.svg');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addWebpackEncoreEntry('admin');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->renderContentMaximized();
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // you can return an URL with the avatar image
            ->setAvatarUrl('https://avatar.iran.liara.run/public');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-chart-simple');

        yield MenuItem::section();
        yield MenuItem::linkToCrud('À propos', 'fas fa-list', About::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('Références', 'fas fa-list', Reference::class);

        yield MenuItem::section();
        yield MenuItem::linkToUrl('Retour vers le site', 'fas fa-arrow-left', $this->urlGenerator->generate('app_homepage'));
    }
}
