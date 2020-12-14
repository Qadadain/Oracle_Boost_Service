<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Composer\Autoload\includeFile;

/**
 * @Route("/profil", name="profile_")
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
        $dungeonBoostRepo = $entityManager->getRepository('App:DungeonBoost');

        $sumUser = (!isset($dungeonBoostRepo->sumBoostByUser($user)[0][1])
            ? $sumUser = 0
            : $sumUser = $dungeonBoostRepo->sumBoostByUser($user)[0][1]);

        $countUser = (!isset($dungeonBoostRepo->countBoostByUser($user)[0][1])
            ? $countUser = 0
            : $countUser = $dungeonBoostRepo->countBoostByUser($user)[0][1]);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'characters' => $characters,
            'sumUser' => $sumUser,
            'countUser' => $countUser
        ]);
    }

    /**
     * @Route("/edit", name="edit")
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request): Response
    {

        $form = $this->createForm(UserType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('profile_index');
        }
        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
