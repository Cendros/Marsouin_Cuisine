<?php

namespace App\Controller;

use App\Entity\Recette;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/recette/{id}', name: 'app_recette')]
    public function index($id): Response
    {
        $repository = $this->em->getRepository(Recette::class);
        $recette = $repository->find($id);
        return $this->render('recette/index.html.twig', [
            'recette' => $recette,
        ]);
    }

    #[Route('/recette/add', name: 'recette.add')]
    public function add(ManagerRegistry $doctrine): Response
    {
        return $this->redirect('/');
    }

    #[Route('/recette/{id}/addEtape', name: 'recette.addEtape')]
    public function addEtape(): Response
    {
    }
}
