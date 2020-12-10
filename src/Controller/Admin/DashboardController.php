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
        yield MenuItem::linktoRoute('Back To OBS', 'fa fa-home', 'home');
        yield MenuItem::section('Utilisateur', 'fas fa-users-cog');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Character', 'fas fa-users', Character::class);
        yield MenuItem::section('Boost', 'fas fa-file-invoice-dollar');
        yield MenuItem::linkToCrud('Dungeon Boost', 'fas fa-dungeon', DungeonBoost::class);
        yield MenuItem::linkToCrud('Raid Boost', 'fas fa-skull-crossbones', RaidBoost::class);
        yield MenuItem::section('Information', 'fas fa-info-circle');
        yield MenuItem::linkToCrud('Raid Offer', 'fas fa-list', RaidOffer::class);
        yield MenuItem::linkToCrud('Information Boost', 'fas fa-list', InformationBoost::class);
        yield MenuItem::section('Gestion', 'fas fa-cogs');
        yield MenuItem::linkToCrud('Armor Type', 'fas fa-tshirt', ArmorType::class);
        yield MenuItem::linkToCrud('Classe', 'fas fa-hat-wizard', Classe::class);
        yield MenuItem::linkToCrud('Dungeon', 'fas fa-dungeon', Dungeon::class);
        yield MenuItem::linkToCrud('Key Difficulty', 'fas fa-key', KeyDifficulty::class);
    }
}
