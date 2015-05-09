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
        $this->tags = $this->db->loadTags();
    }

    //QUESTIONS
    public function create()
    {
        $this->title = "Ask a question";
        $this->categories = $this->db->loadCategories();
        if ($this->isPost) {
            $userName = $_SESSION['username'];
            $title = $_POST['questionTitle'];
            $content = $_POST['questionContent'];
            $category = $_POST['category'];
            $visits = 0;
            $question = $this->questions = $this->db->createQuestion($userName, $title, $content, $category, $visits);

            $this->tempGetQuestion = $this->db->tempGetQuestion($content);

            foreach ($this->tempGetQuestion as $question) {

                $questionId = $question['id'];
                $tags = $_POST['tags'];
                $tagsArr = explode(', ', $tags);

                foreach ($tagsArr as $tag) {
                    $this->addedTags = $this->db->addQuestionTags($tag, $questionId);
                }
            }

            if ($question) {
                $this->addSuccessMessage('Question created.');
            }else {
                $this->addErrorMessage('Question failed to create!');

            }

            $this->redirectToUrl('/questions');

        }
    }


    public function viewQuestion($id)
    {
        $this->questions = $this->db->viewQuestion($id);

        foreach ($this->questions as $question) {
            $visitCounter = $question['visits'];
            $visitCounter++;
        }

        $this->visit = $this->db->increaseVisit($id, $visitCounter);
        $this->answers = $this->db->viewQuestionAnswers($id);
        $this->users = $this->db->getUsers();
    }


    //ANSWERS
    public function createAnswer($inputQuestionId)
    {
        $this->title = "Answer the question";
        $this->questionId = $inputQuestionId;
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
            $answer = $this->answers = $this->db->postAnswer($theQuestionId, $userName, $content, $userEmail);

            if ($answer) {
                $this->addSuccessMessage('Answer created!');
            }else {
                $this->addErrorMessage('Failed to create answer!');
            }

            $this->redirectToUrl('/questions/viewQuestion/' . $theQuestionId);
        }
    }


    //CATEGORIES
    public function viewCategory($category)
    {
        $this->questions = $this->db->getQuestionsCategory($category);
        $this->categories = $this->db->loadCategories();
        $this->tags = $this->db->loadTags();
    }


    //TAGS
    public function viewTag($tag)
    {
        $this->questions = $this->db->getQuestionsTag($tag);
        $this->tags = $this->db->loadTags();
        $this->categories = $this->db->loadCategories();
    }


    //ADMIN FUNCTIONS
    public function deleteQuestion($id)
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->deleteQuestion($id);
            $this->addSuccessMessage('Question deleted!');
            $this->redirect('questions');
        } else {
            $this->redirectToUrl('/questions');
        }
    }


    public function addCategory()
    {
        if ($_SESSION['isAdmin'] > 0) {
            if ($this->isPost) {
                $addCategory = $_POST['addCategory'];
                $category = $this->category = $this->db->addCategory($addCategory);

                if ($category) {
                    $this->addSuccessMessage('Category created!');
                }else {
                    $this->addErrorMessage('Failed to create category!');
                }

                $this->redirectToUrl('/questions');
            }
        } else {
            $this->redirectToUrl('/questions');
        }
    }


    public function deleteCategory($id){
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->deleteCategory($id);
            $this->addSuccessMessage('Category deleted!');
            $this->redirect('questions');
        } else {
            $this->redirectToUrl('/questions');
        }
    }


    public function deleteTag($id){
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->deleteTag($id);
            $this->addSuccessMessage('Tag deleted!');
            $this->redirect('questions');
        } else {
            $this->redirectToUrl('/questions');
        }
    }
}
