<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;


class BookService extends AbstractService
{

    public function __construct(EntityManager $em, $entityName)
    {
        $this->em = $em;
        $this->model = $em->getRepository($entityName);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getBook($book_id)
    {
        return $this->find($book_id);
    }

    public function getAllBooks()
    {
        return $this->findAll();
    }

    public function addBook($book)
    {
        return $this->save($book);
    }

    public function deleteBook($id)
    {
        return $this->delete($this->find($id));
    }
}
