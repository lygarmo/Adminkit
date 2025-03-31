<?php

namespace App\Controller;

use App\Entity\LibroNoRelacional;
use App\Form\LibroNoRelacionalType;
use App\Repository\LibroNoRelacionalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/libro/no/relacional')]
final class LibroNoRelacionalController extends AbstractController
{
    #[Route(name: 'app_libro_no_relacional_index', methods: ['GET'])]
    public function index(LibroNoRelacionalRepository $libroNoRelacionalRepository): Response
    {
        return $this->render('libro_no_relacional/index.html.twig', [ //solo coge los activos
            'libro_no_relacionals' => $libroNoRelacionalRepository->findAllActivos(),
        ]);
    }

    #[Route('/new', name: 'app_libro_no_relacional_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $libroNoRelacional = new LibroNoRelacional();
        $form = $this->createForm(LibroNoRelacionalType::class, $libroNoRelacional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($libroNoRelacional);
            $entityManager->flush();

            return $this->redirectToRoute('app_libro_no_relacional_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro_no_relacional/new.html.twig', [
            'libro_no_relacional' => $libroNoRelacional,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libro_no_relacional_show', methods: ['GET'])]
    public function show(LibroNoRelacional $libroNoRelacional): Response
    {
        return $this->render('libro_no_relacional/show.html.twig', [
            'libro_no_relacional' => $libroNoRelacional,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_libro_no_relacional_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LibroNoRelacional $libroNoRelacional, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LibroNoRelacionalType::class, $libroNoRelacional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_libro_no_relacional_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro_no_relacional/edit.html.twig', [
            'libro_no_relacional' => $libroNoRelacional,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libro_no_relacional_delete', methods: ['POST'])]
    public function delete(Request $request, LibroNoRelacional $libroNoRelacional, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $libroNoRelacional->getId(), $request->getPayload()->getString('_token'))) {
            $libroNoRelacional->setActivo(false);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_libro_no_relacional_index', [], Response::HTTP_SEE_OTHER);
    }

}
