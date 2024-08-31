<?php

namespace App\Controller;

use App\Entity\Cow;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FarmController extends AbstractController
{
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
}
