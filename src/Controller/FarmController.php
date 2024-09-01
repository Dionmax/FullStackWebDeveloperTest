<?php

namespace App\Controller;

use App\Entity\Cow;
use App\Entity\Farm;
use App\Form\FarmType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FarmController extends AbstractController
{

    #[Route('/farm', name: 'farm_index')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request)
    {
        $farms = $entityManager->getRepository(Farm::class)->findAllFarm();

        $query = $entityManager->createQuery($farms);

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('farm/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/farm/{id}/slaughter', name: 'farm_slaughter')]
    public function SlaughterCows(EntityManagerInterface $entityManager, $id)
    {
        /** @var Cow[] $cows */
        $cows = $entityManager->getRepository(Cow::class)->findAllCowsIdForSlaughter($id);

        foreach ($cows as $cow) {
            $cow = $entityManager->getRepository(Cow::class)->find($cow['id']);

            $cow->setSlaughtered(true);
        }

        $entityManager->flush();

        $this->addFlash('success', 'Cows have been slaughtered');

        return $this->redirectToRoute('report_show', ['id' => $id]);
    }

    #[Route('/farm/{id}', name: 'farm_edit')]
    public function edit(EntityManagerInterface $entityManager, $id, Request $request)
    {
        $form = $this->createForm(FarmType::class, $entityManager->getRepository(Farm::class)->find($id));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Farm has been updated');

            return $this->redirectToRoute('farm_index');
        }

        dump($form); die;

        return $this->render('farm/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/farm/{id}', name: 'farm_delete', methods: ['POST'])]
    public function delete(EntityManagerInterface $entityManager, $id)
    {
        $farm = $entityManager->getRepository(Farm::class)->find($id);

        $entityManager->remove($farm);
        $entityManager->flush();

        $this->addFlash('success', 'Farm has been deleted');

        return $this->redirectToRoute('farm_index');
    }
}
