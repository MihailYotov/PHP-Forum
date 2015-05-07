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
        $this->categories = $this->db->loadCategories();


    }

    public function viewQuestion($id)
    {
        $this->questions = $this->db->viewQuestion($id);

        foreach($this->questions as $question){
            $visitCounter = $question['visits'];
            $visitCounter ++;
        }

        $this->visit = $this->db->increaseVisit($id, $visitCounter);
        $this->answers = $this->db->viewQuestionAnswers($id);
        $this->users = $this->db->getUsers();
    }

    public function viewCategory($category)
    {
        $this->questions = $this->db->getQuestionsCategory($category);
        $this->categories = $this->db->loadCategories();
//        $this->redirectToUrl('questions');
    }


    public function create()
    {
        $this->title = "Ask a question";
        $this->categories = $this->db->loadCategories();
        if ($this->isPost) {
            $userName = $_SESSION['username'];
            $title = $_POST['questionTitle'];
            $content = $_POST['questionContent'];
            $category = $_POST['category'];
            $this->questions = $this->db->createQuestion($userName, $title, $content, $category);
            $this->redirectToUrl('/questions');

        }
    }

    public function createAnswer($inputQuestionId)
    {
        $this->title = "Answer the question";
        $this->questionId = $inputQuestionId;

//        if ($this->isPost) {
//            $theQuestionId = $_POST['theQuestionId'];
//            if ($_SESSION['username']) {
//                $userName = $_SESSION['username'];
//            } else {
//                $userName = $_POST['annonimusName'];
//            }
//                $userEmail = $_POST['annonimusEmail'];
//            $content = $_POST['answerContent'];
//            $this->answers = $this->db->createAnswer($theQuestionId, $userName, $content, $userEmail);
//            //$this->redirectToUrl('/questions');
//        }
    }

    public function postAnswer()
    {
        if ($this->isPost) {
            $theQuestionId = $_POST['theQuestionId'];
            if ($_SESSION['username']) {
                $userName = $_SESSION['username'];
            } else {
                $userName = $_POST['annonimusName'];
            }
            $userEmail = $_POST['annonimusEmail'];
            $content = $_POST['answerContent'];
            $this->answers = $this->db->postAnswer($theQuestionId, $userName, $content, $userEmail);
            $this->redirectToUrl('/questions/viewQuestion/' . $theQuestionId);
        }
    }

    //Admin functions
    public function deleteQuestion($id)
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->deleteQuestion($id);
            $this->redirect('questions');
        }
    }

    public function addCategory(){
        if ($_SESSION['isAdmin'] > 0) {
            if ($this->isPost) {
                $addCategory = $_POST['addCategory'];
                $this->category = $this->db->addCategory($addCategory);
                $this->redirectToUrl('/questions');
            }
        }
    }
}
