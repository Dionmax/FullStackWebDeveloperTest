<?php

namespace App\Controller;

use App\Entity\Cow;
use App\Form\CowType;
use App\Repository\CowRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cow')]
class CowController extends AbstractController
{
    #[Route('/', name: 'app_cow_index', methods: ['GET'])]
    public function index(CowRepository $cowRepository, EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $cows = $cowRepository->findAllCows();

        $query = $entityManager->createQuery($cows);

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('cow/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/new', name: 'app_cow_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cow = new Cow();
        $form = $this->createForm(CowType::class, $cow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cow);
            $entityManager->flush();

            $this->addFlash('success', 'Cow has been created');
            return $this->redirectToRoute('app_cow_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cow/new.html.twig', [
            'cow' => $cow,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cow_show', methods: ['GET'])]
    public function show(Cow $cow): Response
    {
        return $this->render('cow/show.html.twig', [
            'cow' => $cow,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cow_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cow $cow, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CowType::class, $cow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Cow has been updated');

            return $this->redirectToRoute('app_cow_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cow/edit.html.twig', [
            'cow' => $cow,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cow_delete', methods: ['POST'])]
    public function delete(Request $request, Cow $cow, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cow->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cow);
            $entityManager->flush();
            $this->addFlash('success', 'Cow has been deleted');
        }

        return $this->redirectToRoute('app_cow_index', [], Response::HTTP_SEE_OTHER);
    }
}
