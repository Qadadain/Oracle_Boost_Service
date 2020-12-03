<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DungeonBoostController extends AbstractController
{
    /**
     * @Route("/dungeon/boost", name="dungeon_boost")
     */
    public function index(): Response
    {
        return $this->render('dungeon_boost/index.html.twig', [
            'controller_name' => 'DungeonBoostController',
        ]);
    }
}
