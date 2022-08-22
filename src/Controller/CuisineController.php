<?php

namespace App\Controller;

use App\Entity\Recette;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuisineController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'app_cuisine')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Recette::class);
        $recettes = $repository->findBy([], ['label' => 'ASC']);
        return $this->render('cuisine/index.html.twig', [
            'recettes' => $recettes
        ]);
    }
}
