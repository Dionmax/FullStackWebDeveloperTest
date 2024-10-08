<?php

namespace App\Controller;

use App\Entity\Veterinarian;
use App\Form\VeterinarianType;
use App\Repository\VeterinarianRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/veterinarian')]
class VeterinarianController extends AbstractController
{
    #[Route('/', name: 'app_veterinarian_index', methods: ['GET'])]
    public function index(VeterinarianRepository $veterinarianRepository, EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {

        $veterinarian = $veterinarianRepository->findAllVeterinarian();

        $query = $entityManager->createQuery($veterinarian);

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('veterinarian/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/new', name: 'app_veterinarian_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $veterinarian = new Veterinarian();
        $form = $this->createForm(VeterinarianType::class, $veterinarian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($veterinarian);
            $entityManager->flush();

            $this->addFlash('success', 'Veterinarian created successfully!');

            return $this->redirectToRoute('app_veterinarian_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('veterinarian/new.html.twig', [
            'veterinarian' => $veterinarian,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_veterinarian_show', methods: ['GET'])]
    public function show(Veterinarian $veterinarian): Response
    {
        return $this->render('veterinarian/show.html.twig', [
            'veterinarian' => $veterinarian,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_veterinarian_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Veterinarian $veterinarian, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VeterinarianType::class, $veterinarian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Veterinarian updated successfully!');

            return $this->redirectToRoute('app_veterinarian_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('veterinarian/edit.html.twig', [
            'veterinarian' => $veterinarian,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_veterinarian_delete', methods: ['POST'])]
    public function delete(Request $request, Veterinarian $veterinarian, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $veterinarian->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($veterinarian);
            $entityManager->flush();

            $this->addFlash('success', 'Veterinarian deleted successfully!');
        }

        return $this->redirectToRoute('app_veterinarian_index', [], Response::HTTP_SEE_OTHER);
    }
}
