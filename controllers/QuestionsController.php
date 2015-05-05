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

    public function viewQuestion($id)
    {
        $this->questions = $this->db->viewQuestion($id);
        $this->answers = $this->db->viewQuestionAnswers($id);
    }



    public function create()
    {
        $this->title = "Ask a question";
        if ($this->isPost) {
            $userId = $_SESSION['userId'];
            $title = $_POST['questionTitle'];
            $content = $_POST['questionContent'];
            $this->questions = $this->db->createQuestion($userId, $title, $content);
            $this->redirect('questions');

        }
    }

//    public function delete($id)
//    {
////        $this->renderView("index");
//        $this->db->deleteAuthor($id);
//        $this->redirect('authors');
//    }
}
