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
 * @Route("/raid-boost", name="raid_boost_")
 */
class RaidBoostController extends AbstractController
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
        $raidBoosts = $em->getRepository('App:RaidBoost')->findAll();

        $results = [];

        foreach ($raidBoosts as $raidBoost){
            $results[] = [
                'customer' => $raidBoost->getCustomer(),
                'amount' => $raidBoost->getAmount(),
                'comment' => $raidBoost->getComment(),
                'date' => $raidBoost->getDate(),
                'armorType' => $raidBoost->getArmorType(),
                'raidOffer' => $raidBoost->getRaidOffer()
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
            ->add('Comment', TextColumn::class, [
                'label' => 'Commentaire.',
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
            ->add('raidOffer', TextColumn::class, [
                'label' => 'Offre.',
                'orderable' => true

            ]);

        $datatable->createAdapter(ArrayAdapter::class, $results);
        $datatable->handleRequest($request);

        if ($datatable->isCallback()) {
            return $datatable->getResponse();
        }

        return $this->render('raid_boost/index.html.twig', [
            'datatable' => $datatable,
        ]);
    }
}
