<?php
ini_set('display_errors', "On");
require_once ('Controller.php');
require_once ('./model/PostModel.php');
require_once('./model/PostModel.php');
require_once('./model/CategoryModel.php');
require_once('./service/validation/PostValidation.php');

/**
 * Class PostController
 */
class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 記事一覧
     */
    public function indexAction()
    {
        $postModel = new PostModel();
        $posts = $postModel->get();
        require("./public/view/post_index.php");
    }

    /**
     * 記事投稿
     */
    public function addAction(){

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        $errors = [];
        $title = '';
        $description = '';

        if (@$_POST['submit']) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $categoryId = $_POST['category'];

            // バリデーションチェック
            $postValidation = new PostValidation();
            $errors = $postValidation->addValidation($title, $description, $categoryId);

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                // DBに登録する
                $postModel = new PostModel();
                $postModel->add($title, $description, $categoryId);
                header('Location: /blog_intern');
                exit();
            }
        }
        require("./public/view/post_add.php");
    }
}