<?php
require_once ('Controller.php');
require_once ('./model/PostModel.php');

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

        header("Location: /blog_intern/public/view/post_add.php");
        exit;
    }

}