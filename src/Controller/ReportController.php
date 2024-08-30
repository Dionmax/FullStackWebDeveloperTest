<?php

namespace App\Controller;

use App\Entity\Farm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/', name: 'report_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $farms = $entityManager->getRepository(Farm::class)->findAllNames();

        // dump($farms[0]["name"]);

        // die;

        return $this->render('report/index.html.twig', [
            'farms' => $farms,
        ]);
    }
}
