<?php

/**
 * Class UserController
 */
class UserController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
    }

    /**
     * ユーザ登録
     */
    public function addAction(){

        header("Location: ./public/view/user_add.php");
        exit;
    }

    /**
     * ログイン
     */
    public function loginAction(){

        header("Location: ./public/view/login.php");
        exit;
    }

    /**
     * ログアウト
     */
    public function logoutAction(){
        session_destroy();
        unset($_SESSION['user']);
        header("Location: /blog_intern/public/view/login.php");
        exit;
    }

}