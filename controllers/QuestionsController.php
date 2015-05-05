<?php

class QuestionsController extends BaseController
{

    private $db;

    public function onInit()
    {
        $this->title = "Questions";
        $this->db = new QuestionsModel();
    }

    public function index()
    {

        $this->questions = $this->db->getAll();

    }

//    public function create()
//    {
////        $this->renderView("create");
//        if ($this->isPost) {
//            $name = $_POST['author_name'];
//            $this->authors = $this->db->createAuthor($name);
//            $this->redirect('authors');
//
//        }
//    }
//
//    public function delete($id)
//    {
////        $this->renderView("index");
//        $this->db->deleteAuthor($id);
//        $this->redirect('authors');
//    }
}
