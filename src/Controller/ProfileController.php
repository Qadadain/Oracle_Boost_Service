<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/profile", name="profile_")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $characters = $entityManager->getRepository('App:Character')->findBy(['user' => $user]);
        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'characters' => $characters,
        ]);
    }
}
