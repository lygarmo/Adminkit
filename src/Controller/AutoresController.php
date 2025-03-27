<?php

namespace App\Controller;

use App\Entity\Autores;
use App\Form\AutoresType;
use App\Repository\AutoresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/autores')]
final class AutoresController extends AbstractController
{
    #[Route(name: 'app_autores_index', methods: ['GET'])]
    public function index(AutoresRepository $autoresRepository): Response
    {
        return $this->render('autores/index.html.twig', [
            'autores' => $autoresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_autores_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $autore = new Autores();
        $form = $this->createForm(AutoresType::class, $autore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($autore);
            $entityManager->flush();

            return $this->redirectToRoute('app_autores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('autores/new.html.twig', [
            'autore' => $autore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_autores_show', methods: ['GET'])]
    public function show(Autores $autor): Response
    {
        return $this->render('autores/show.html.twig', [
            'autor' => $autor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_autores_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Autores $autore, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AutoresType::class, $autore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_autores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('autores/edit.html.twig', [
            'autore' => $autore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_autores_delete', methods: ['POST'])]
    public function delete(Request $request, Autores $autore, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$autore->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($autore);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_autores_index', [], Response::HTTP_SEE_OTHER);
    }
}
