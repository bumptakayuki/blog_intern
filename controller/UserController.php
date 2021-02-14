<?php
require_once('./model/UserModel.php');
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

        $errors = [];

        if (@$_POST['submit']) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // バリデーションチェック
            $errors = $this->addValidation($username);

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                $userModel = new UserModel();
                $userModel->add($username, $email,$password);
                header("Location: ../login");
                exit();
            }
        }

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

    /**
     * @param $name
     * @return array
     */
    private function addValidation($name){

        $errors = [];

        if (empty($name)){
            $errors['username'] = 'カテゴリ名がありません。<br>';
        }
        if (mb_strlen($name) > 80){
            $errors['username'] = 'カテゴリ名が長すぎます。<br>';
        }
        return $errors;
    }
}