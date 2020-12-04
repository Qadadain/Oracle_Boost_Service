<?php

namespace App\Controller\Admin;

use App\Entity\ArmorType;
use App\Entity\Character;
use App\Entity\Classe;
use App\Entity\Dungeon;
use App\Entity\DungeonBoost;
use App\Entity\InformationBoost;
use App\Entity\KeyDifficulty;
use App\Entity\RaidBoost;
use App\Entity\RaidOffer;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
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
            ->setTitle('Oracle Boost Service');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back To OBS', 'fa fa-home', 'home');
        yield MenuItem::section('Utilisateur');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Character', 'fas fa-list', Character::class);
        yield MenuItem::section('Boost');
        yield MenuItem::linkToCrud('Dungeon Boost', 'fas fa-list', DungeonBoost::class);
        yield MenuItem::linkToCrud('Raid Boost', 'fas fa-list', RaidBoost::class);
        yield MenuItem::section('Information');
        yield MenuItem::linkToCrud('Raid Offer', 'fas fa-list', RaidOffer::class);
        yield MenuItem::linkToCrud('Information Boost', 'fas fa-list', InformationBoost::class);
        yield MenuItem::section('Gestion');
        yield MenuItem::linkToCrud('Armor Type', 'fas fa-list', ArmorType::class);
        yield MenuItem::linkToCrud('Classe', 'fas fa-list', Classe::class);
        yield MenuItem::linkToCrud('Dungeon', 'fas fa-list', Dungeon::class);
        yield MenuItem::linkToCrud('Key Difficulty', 'fas fa-list', KeyDifficulty::class);
    }
}
