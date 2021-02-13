<?php
require_once('./model/UserModel.php');

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
        require("./public/view/user_add.php");
    }

    /**
     * ログイン
     */
    public function loginAction(){

        $errors = [];

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                $userModel = new UserModel();
                $user = $userModel->login($email, $password);
                if(count($user) > 0){

                    $_SESSION['user'] = $user;
                    header("Location: /blog_intern");

                }else{
                    $errors[] = 'ログインに失敗しました';
                }
            }
        }

        require("./public/view/login.php");
    }

    /**
     * ログアウト
     */
    public function logoutAction(){
        session_destroy();
        unset($_SESSION['user']);
        require("./public/view/login.php");
    }
}