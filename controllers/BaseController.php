<?php

class BaseController {
    protected $layoutName = DEFAULT_LAYOUT;
    protected $isViewRendered = false;

    function __construct($controllerName, $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        if (isset($_SESSION['username'])) {
            $this->isLoggedIn = true;
        }

        $this->onInit();
    }

    public function onInit()
    {

    }

    public function index()
    {

    }

    public function renderView($viewName = NULL, $includeLayout = true)
    {
        if (!$this->isViewRendered) {
            if ($viewName == null) {
                $viewName = $this->actionName;
            }

            $viewFileName = 'views/' . $this->controllerName
                . '/' . $viewName . '.php';
            if ($includeLayout) {
                $headerFile = 'views/layouts/' . $this->layoutName . '/header.php';
                include_once($headerFile);
            }

            include_once($viewFileName);

            if ($includeLayout) {
                $footerFile = 'views/layouts/' . $this->layoutName . '/footer.php';
                include_once($footerFile);
            }
            $this->isViewRendered = true;
        }
    }
}