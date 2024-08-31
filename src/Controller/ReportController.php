<?php

namespace App\Controller;

use App\Entity\Cow;
use App\Entity\Farm;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/', name: 'report_index')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {

        $farms = $entityManager->getRepository(Farm::class)->findAllBasicInformation();

        ### Paginator
        $query = $entityManager->createQuery($farms);

        $paginataion = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        ###

        return $this->render('report/index.html.twig', [
            'pagination' => $paginataion,
            'defaultFilterFields' => ['f.name'],
        ]);
    }

    #[Route('/report/{id}', name: 'report_show')]
    public function show(EntityManagerInterface $entityManager, $id,  PaginatorInterface $paginator, Request $request): Response
    {
        # Cows For Slaughter
        $cowsForSlaughter = $entityManager->getRepository(Cow::class)->findAllCowsForSlaughter($id);

        $cowsForSlaughterQuery = $entityManager->createQuery($cowsForSlaughter)->setParameter('farmId', $id);

        $cowsForSlaughterPaginator = $paginator->paginate(
            $cowsForSlaughterQuery,
            $request->query->getInt('cowsForSlaughterPage', 1),
            5,
            array(
                'pageParameterName' => 'cowsForSlaughterPage',
                'sortFieldParameterName' => 'sort1',
                'sortDirectionParameterName' => 'direction1',
            )
        );

        # Cow Slaughtered
        $slaughteredCows = $entityManager->getRepository(Farm::class)->findCountCowsSlaughtered($id);

        return $this->render('report/show.html.twig', [
            'cowsForSlaughterPaginator' => $cowsForSlaughterPaginator,
            'slaughteredCows' => $slaughteredCows,
            'farmId' => $id,
        ]);
    }
}
