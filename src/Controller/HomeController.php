<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        $dungeonBoosts =  $em->getRepository('App:DungeonBoost')->findAll();
        $raidBoosts =  $em->getRepository('App:RaidBoost')->findAll();
        $informationGuilds = $em->getRepository('App:InformationGuild')->findAll();
        $informationRaids = $em->getRepository('App:InformationRaid')->findAll();
        $informationMembers = $em->getRepository('App:InformationMember')->findAll();
        $variousLinks = $em->getRepository('App:VariousLink')->findAll();

        $countDungeonBoost = count($dungeonBoosts);
        $countRaidBoost = count($raidBoosts);

        $sumAmountDungeonBoost = 0;
        $sumAmountRaidBoost = 0;

        foreach ($dungeonBoosts as $dungeonBoost){
            $sumAmountDungeonBoost += $dungeonBoost->getAmount();
        }

        foreach ($raidBoosts as $raidBoost){
            $sumAmountRaidBoost += $raidBoost->getAmount();
        }

        return $this->render('home/index.html.twig', [
            'user' => $this->getUser(),
            'sumDungeonBoost' => $sumAmountDungeonBoost,
            'sumRaidBoost' => $sumAmountRaidBoost,
            'countDungeonBoost' => $countDungeonBoost,
            'countRaidBoost' => $countRaidBoost,
            'guildInformations' => $informationGuilds,
            'memberInformations' => $informationMembers,
            'raidInformations' => $informationRaids,
            'variousLinks' => $variousLinks,
        ]);
    }
}
