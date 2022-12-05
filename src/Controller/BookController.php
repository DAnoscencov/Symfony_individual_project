<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Service\BookService;
use App\Form\BookFormType;
use Psr\Log\LoggerInterface;

class BookController extends AbstractController
{

    #[Route('/')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->info("Index page: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->render('book/index.html.twig', []);
    }


    /**
     * Matches /blog/*
     *
     * @Route("/books", name="display_books")
     */
    public function displayCars(ManagerRegistry $doctrine, LoggerInterface $logger): Response
    {
        $bookService = new BookService($doctrine->getManager(), Book::class);
        $books = $bookService->getAllBooks();
        $logger->info("List of cars page: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->render('default/books.html.twig', array('books' => $books));
    }

    #[Route('/book', name: 'create_book')]
    public function createCar(Request $request, ManagerRegistry $doctrine, LoggerInterface $logger): Response
    {
        $book = new Book();

        $form = $this->createForm(BookFormType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($book);
            $entityManager->flush();
            $logger->info("Create book action: user IP " . $_SERVER['REMOTE_ADDR']);
            return $this->redirectToRoute('display_books');
        }

        $logger->info("Create book action: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->render('default/form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    #[Route('/book/{id}', name: 'display_book')]
    public function displayCar(int $id, ManagerRegistry $doctrine, LoggerInterface $logger): Response
    {
        $bookService  = new BookService($doctrine->getManager(), Book::class);
        $book = $bookService->getBook($id);
        $logger->info("Book page: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->render('book/display.html.twig', array('book' => $book));
    }

    #[Route('/book/update/{id}', name: 'update_book')]
    public function updateCar(Request $request, $id, ManagerRegistry $doctrine, LoggerInterface $logger): Response
    {
        $book = $doctrine->getRepository(Book::class)->find($id);

        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bookService = new BookService($doctrine->getManager(), Book::class);
            $bookService->addBook($book);
            $logger->info("Update book action: user IP " . $_SERVER['REMOTE_ADDR']);
            return $this->redirectToRoute('display_books');
        }

        $logger->info("Update car action: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->render('default/form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    #[Route('/book/delete/{id}', name: 'delete_book')]
    public function deleteCar(Request $request, $id, ManagerRegistry $doctrine, LoggerInterface $logger): Response
    {
        $bookService = new BookService($doctrine->getManager(), Book::class);
        $bookService->deleteBook($id);
        $logger->info("Delete book action: user IP " . $_SERVER['REMOTE_ADDR']);
        return $this->redirectToRoute('display_books');
    }
}
