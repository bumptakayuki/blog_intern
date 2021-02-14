<?php
require_once ('Controller.php');
require_once('./model/CategoryModel.php');
require_once('./service/validation/CategoryValidation.php');

/**
 * Class CategoryController
 */
class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * カテゴリ一覧
     */
    public function indexAction()
    {

    }

    /**
     *　カテゴリ登録
     */
    public function addAction()
    {

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        $errors = [];
        $name = '';

        if (@$_POST['submit']) {

            $name = $_POST['name'];

            // バリデーションチェック
            $categoryValidation = new CategoryValidation();
            $errors = $categoryValidation->addValidation($name);

            // バリデーションエラーがない場合
            if (count($errors) === 0) {
                $categoryModel = new CategoryModel();
                $categoryModel->add($name);
                header('Location: /blog_intern');
                exit();
            }
        }
        require("./public/view/category_add.php");
    }
}