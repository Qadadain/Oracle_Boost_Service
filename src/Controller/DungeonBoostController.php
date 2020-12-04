<?php

namespace App\Controller;

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
                'id' => $dungeonBoost->getId(),
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
            ->add('id', TextColumn::class, [
                'label' => 'id.'
            ])
            ->add('customer', TextColumn::class, [
                'label' => 'client.',
                'orderable' => true
            ])
            ->add('amount', TextColumn::class, [
                'label' => 'Montant.',
                'orderable' => true
            ])
            ->add('Comment', TextColumn::class, [
                'label' => 'Commentaire.',
                'orderable' => true
            ])
            ->add('date', DateTimeColumn::class, [
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
}
