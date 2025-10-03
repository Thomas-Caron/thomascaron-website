<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\Project;
use App\Entity\Reference;
use App\Service\GoogleAnalyticsService;
use DateInterval;
use DatePeriod;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\RequestStack;
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
        private readonly ChartBuilderInterface $chartBuilder,
        private readonly GoogleAnalyticsService $gaService,
        private readonly RequestStack $requestStack
    )
    {}

    public function index(): Response
    {
        $request = $this->requestStack->getCurrentRequest();
        $period = $request ? $request->query->get('period', '30days') : '30days';
        $labels = [];
        $dateRanges = [];

        if ($period === '30days') {
            $start = new DateTime('-29 days');
            $end = new DateTime('today');
            $interval = new DateInterval('P1D');
            $periods = new DatePeriod($start, $interval, $end->add(new DateInterval('P1D')));
            foreach ($periods as $date) {
                $labels[] = $date->format('d M');
                $dateRanges[] = ['startDate' => $date->format('Y-m-d'), 'endDate' => $date->format('Y-m-d')];
            }
        } else { // 6months ou 1year
            $monthsCount = $period === '6months' ? 6 : 12;
            for ($i = $monthsCount - 1; $i >= 0; $i--) {
                $date = new DateTime("first day of -$i month");
                $labels[] = $date->format('M Y');
                $startDate = $date->format('Y-m-01');
                $endDate = $date->format('Y-m-t');
                $dateRanges[] = ['startDate' => $startDate, 'endDate' => $endDate];
            }
        }

        $visitorsData = [];
        foreach ($dateRanges as $range) {
            $visitorsData[] = $this->gaService->getVisitors('247272259', $range['startDate'], $range['endDate']);
        }

        $chart = $this->chartBuilder->createChart(Chart::TYPE_BAR);
        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Visiteurs',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $visitorsData,
                ],
            ],
        ]);

        $chart->setOptions([
            'responsive' => true,
            'scales' => [
                'y' => ['beginAtZero' => true],
            ],
        ]);

        return $this->render('admin/dashboard.html.twig', [
            'chart' => $chart,
            'period' => $period,
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
