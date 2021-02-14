<?php
require_once('./model/UserModel.php');
require_once('Validation.php');

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
    public function addAction()
    {

        if (@$_POST['submit']) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // バリデーションチェック
            $errors = $this->validateAdd($_POST);

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                $userModel = new UserModel();
                $userModel->add($username, $email, $password);
                header("Location: ../login");
                exit();
            }
        }

        require("./public/view/user_add.php");
    }

    /**
     * ログイン
     */
    public function loginAction()
    {

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // バリデーションチェック
            $errors = $this->validateLogin($_POST);

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                $userModel = new UserModel();
                $user = $userModel->login($email, $password);
                if (count($user) > 0) {

                    $_SESSION['user'] = $user;
                    header("Location: ./");

                } else {
                    $errors['email'] = 'メールアドレスまたはパスワードが一致しません。';
                    $errors['password'] = 'メールアドレスまたはパスワードが一致しません。';
                }
            }
        }

        require("./public/view/login.php");
    }

    /**
     * ログアウト
     */
    public function logoutAction()
    {

        // セッションを削除
        if (isset($_SESSION)) {
            $_SESSION = array();
        }

        // セッションクッキーを削除
        if (isset($_COOKIE['cookie'])) {
            setcookie('cookie', '', time(), 1800, '/');
        }

        session_destroy();

        require("./public/view/login.php");
    }

    /**
     * @param $name
     * @return array
     */
    private function validateLogin($input)
    {

        $errors = [];
        $validation = new Validation();

        foreach ($input as $key => $value) {
            if ($validation->blankCheck($input[$key])) {

                switch ($key) {
                    case 'email':
                        $errors[$key] = 'メールアドレスを入力してください';
                        break;

                    case 'password':
                        $errors[$key] = 'パスワードを入力してください';
                        break;

                    default:
                        break;
                }
            }
        }

        if ($validation->emailCheck($input['email'])) {
            $errors['email'] = 'メールアドレスの形式が違います。';
        }

        return $errors;
    }

    /**
     * @param $name
     * @return array
     */
    private function validateAdd($input)
    {
        $errors = [];
        $validation = new Validation();

        // 未入力チェック
        foreach ($_POST as $key => $value) {
            if ($validation->blankCheck($input[$key])) {

                switch ($key) {
                    case 'email':
                        $errors[$key] = 'メールアドレスを入力してください';
                        break;
                    case 'password':
                        $errors[$key] = 'パスワードを入力してください';
                        break;
                    case 'name':
                        $errors[$key] = 'ユーザ名を入力してください';
                        break;
                    default:
                        break;
                }
            }
        }

        // 重複チェック
        $userModel = new UserModel();
        if ($userModel->countEmail($_POST) > 0) {
            $errors['email'] = 'そのメールアドレスは既に使用されています。<br>別のメールアドレスを使用してください。';
        }

        // メールアドレス形式チェック
        if ($validation->emailCheck($_POST['email'])) {
            $errors['email'] = 'メールアドレスの形式が正しくありません。正しく入力してください。';
        }

        // 入力文字形式チェック
        if ($validation->typeCheck($_POST['password'])) {
            $errors['password'] = 'パスワードは半角英数字で入力してください';
        }

        //文字数制限
        if ($validation->length4_10Check(mb_strlen($_POST['username'], 'UTF-8'))) {
            $errors['username'] = 'ユーザー名は4〜10文字で入力してください。';
        }
        if ($validation->length50Check(strlen($_POST['email']))) {
            $errors['email'] = 'メールアドレスは50文字以内で入力してください。';
        }
        if ($validation->length4_10Check(strlen($_POST['password']))) {
            $errors['password'] = 'パスワードは4〜10文字で入力してください。';
        }

        return $errors;
    }
}