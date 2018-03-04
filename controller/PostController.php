<?php
require_once ('Controller.php');


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
    public function indexAction(){

        header("Location: ./public/view/post_index.php");
        exit;
    }

    /**
     * 記事投稿
     */
    public function addAction(){

        header("Location: /blog_intern/public/view/post_add.php");
        exit;
    }

}