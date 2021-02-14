<?php
ini_set('display_errors', "On");
require_once ('./route/RequestUrl.php');
require_once ('./controller/PostController.php');
require_once ('./controller/CategoryController.php');
require_once ('./controller/UserController.php');

$request = new RequestUrl();
$url = $request->getPathInfo();
// routing
switch ($url){
    case '/':
    case '/post':
        $postController = new PostController();
        $postController->indexAction();
        break;
    case '/post/add':
        $postController = new PostController();
        $postController->addAction();
        break;
    case '/user/add':
        $userController = new UserController();
        $userController->addAction();
        break;
    case '/login':
        $userController = new UserController();
        $userController->loginAction();
        break;
    case '/logout':
        $userController = new UserController();
        $userController->logoutAction();
        break;
    case '/category/add':
        $categoryController = new CategoryController();
        $categoryController->addAction();
        break;
    case '/tag':
        break;
}

