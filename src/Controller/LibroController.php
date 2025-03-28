<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Form\LibroType;
use App\Repository\LibroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/libro')]
final class LibroController extends AbstractController
{
    #[Route(name: 'app_libro_index', methods: ['GET'])]
    public function index(LibroRepository $libroRepository): Response
    {
        return $this->render('libro/index.html.twig', [
            'libros' => $libroRepository->findAll(),
        ]);
    }

    #[Route('/datetable-index', name: 'app_datetable_datetableIndex', methods: ['GET'])]
    public function datetableIndex(LibroRepository $libroRepository): Response
    {
        return $this->render('libro/datetable.html.twig', [
            'libros' => $libroRepository->findAll(),
        ]);
    }

    #[Route('/popup-index', name: 'app_popup_index', methods: ['GET'])]
    public function popupIndex(LibroRepository $libroRepository): Response
    {
        return $this->render('libro/popup.html.twig', [
            'libros' => $libroRepository->findAll(),
        ]);
    }
 
    #[Route('/new', name: 'app_libro_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $libro = new Libro();
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($libro);
            $entityManager->flush();

            return $this->redirectToRoute('app_libro_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/new.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/datetable-new', name: 'app_datetable_datetableNew', methods: ['GET', 'POST'])]
    public function datetableNew(Request $request, EntityManagerInterface $entityManager): Response
    {
        $libro = new Libro();
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($libro);
            $entityManager->flush();

            return $this->redirectToRoute('app_datetable_datetableIndex', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/datetablenew.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/popup-new', name: 'app_popup_new', methods: ['GET', 'POST'])]
    public function popupNew(Request $request, EntityManagerInterface $entityManager): Response
    {
        $libro = new Libro();
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($libro);
            $entityManager->flush();

            return $this->redirectToRoute('app_popup_ndex', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/popupnew.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libro_show', methods: ['GET'])]
    public function show(Libro $libro): Response
    {
        return $this->render('libro/show.html.twig', [
            'libro' => $libro,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_libro_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_libro_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/edit.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/datetable/{id}/edit', name: 'app_datetable_edit', methods: ['GET', 'POST'])]
    public function datetableEdit(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_datetable_datetableIndex', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/datetableedit.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/popup/{id}/edit', name: 'app_popup_edit', methods: ['GET', 'POST'])]
    public function popupEdit(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_popup_ndex', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('libro/popupedit.html.twig', [
            'libro' => $libro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_libro_delete', methods: ['POST'])]
    public function delete(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libro->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($libro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_libro_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/datetable/{id}', name: 'app_datetable_delete', methods: ['POST'])]
    public function datetableDelete(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libro->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($libro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_datetable_datetableIndex', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/popup/{id}', name: 'app_popup_delete', methods: ['POST'])]
    public function popupDelete(Request $request, Libro $libro, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libro->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($libro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_popup_index', [], Response::HTTP_SEE_OTHER);
    }
}
