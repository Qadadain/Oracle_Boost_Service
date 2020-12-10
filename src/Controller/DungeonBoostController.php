<?php

namespace App\Controller;

use App\Entity\DungeonBoost;
use App\Form\DungeonBoostType;
use Doctrine\ORM\EntityManagerInterface;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\DateTimeColumn;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/dungeon-boost", name="dungeon_boost_")
 */
class DungeonBoostController extends AbstractController
{

    /**
     * @Route("/", name="show")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param DataTableFactory $dataTableFactory
     * @return Response
     */
    public function index(EntityManagerInterface $em, Request $request, DataTableFactory $dataTableFactory): Response
    {
        $dungeonBoosts = $em->getRepository('App:DungeonBoost')->findAll();

        $results = [];
        foreach ($dungeonBoosts as $dungeonBoost){
            $results[] = [
                'customer' => $dungeonBoost->getCustomer(),
                'amount' => $dungeonBoost->getAmount(),
                'comment' => $dungeonBoost->getComment(),
                'date' => $dungeonBoost->getDate(),
                'armorType' => $dungeonBoost->getArmorType(),
                'dungeon' => $dungeonBoost->getDungeon(),
                'keyDifficulty' => $dungeonBoost->getKeyDifficulty(),
                'tank' => $dungeonBoost->getTank(),
                'heal' => $dungeonBoost->getHeal(),
                'dpsOne' => $dungeonBoost->getDpsOne(),
                'dpsTwo' => $dungeonBoost->getDpsTwo(),
            ];
        }
        $datatable = $dataTableFactory->create()
            ->add('customer', TextColumn::class, [
                'label' => 'client.',
                'orderable' => true
            ])
            ->add('amount', TextColumn::class, [
                'label' => 'Montant.',
                'orderable' => true
            ])
            ->add('date', DateTimeColumn::class, [
                'format' => 'd-m-Y',
                'label' => 'Date.',
                'orderable' => true
            ])
            ->add('armorType', TextColumn::class, [
                'label' => 'Armure.',
                'orderable' => true
            ])
            ->add('dungeon', TextColumn::class, [
                'label' => 'Donjon.',
                'orderable' => true
            ])
            ->add('keyDifficulty', TextColumn::class, [
                'label' => 'Clé.',
                'orderable' => true
            ])
            ->add('tank', TextColumn::class, [
                'label' => 'Tank.',
                'orderable' => true
            ])
            ->add('heal', TextColumn::class, [
                'label' => 'Heal.',
                'orderable' => true
            ])
            ->add('dpsOne', TextColumn::class, [
                'label' => 'DPS.',
                'orderable' => true
            ])
            ->add('dpsTwo', TextColumn::class, [
                'label' => 'DPS.',
                'orderable' => true
            ]);

        $datatable->createAdapter(ArrayAdapter::class, $results);
        $datatable->handleRequest($request);

        if ($datatable->isCallback()) {
            return $datatable->getResponse();
        }

        return $this->render('dungeon_boost/index.html.twig', [
            'datatable' => $datatable,
        ]);
    }

    /**
     * @Route ("/new", name="new")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $dungeonBoost = new DungeonBoost();
        $form = $this->createForm(DungeonBoostType::class, $dungeonBoost);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($dungeonBoost);
            $em->flush();
            return $this->redirectToRoute('dungeon_boost_show');
        }
        return $this->render('dungeon_boost/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
