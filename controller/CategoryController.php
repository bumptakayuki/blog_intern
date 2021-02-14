<?php
require_once ('Controller.php');
require_once('./model/CategoryModel.php');

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
            $errors = $this->addValidation($name);

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

    /**
     * @param $name
     * @return array
     */
    private function addValidation($name){

        $errors = [];

        if (empty($name)){
            $errors['name'] = 'カテゴリ名がありません。<br>';
        }
        if (mb_strlen($name) > 80){
            $errors['name'] = 'カテゴリ名が長すぎます。<br>';
        }
        return $errors;
    }
}