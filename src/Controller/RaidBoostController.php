<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaidBoostController extends AbstractController
{
    /**
     * @Route("/raid/boost", name="raid_boost")
     */
    public function index(): Response
    {
        return $this->render('raid_boost/index.html.twig', [
            'controller_name' => 'RaidBoostController',
        ]);
    }
}
