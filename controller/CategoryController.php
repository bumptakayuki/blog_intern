<?php
require_once ('Controller.php');

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
    public function indexAction(){

    }

    /**
     *　カテゴリ登録
     */
    public function addAction(){

        header("Location: /blog_intern/public/view/category_add.php");
        exit;
    }

}