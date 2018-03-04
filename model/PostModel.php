<?php

require_once('Model.php');

/**
 * Class PostModel
 */
class PostModel extends Model
{

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * PostModel constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->pdo = parent::getPdo();
    }

    /**
     * @return array
     */
    public function get()
    {
        $st = $this->pdo->query("SELECT 
            posts.id,
            posts.title,
            posts.description,
            posts.category_id,
            posts.created_at,
            categories.name as category_name
             FROM posts INNER JOIN categories 
        ON posts.category_id = categories.id;");


        try {
            $posts = $st->fetchAll();

        } catch (PDOException $e) {

            exit('取得失敗' . $e->getMessage());
        }

        return $posts;
    }

    /**
     * @param $title
     * @param $description
     * @param $categoryId
     */
    public function add($title, $description, $categoryId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, description, category_id) VALUES (:title, :description, :category_id)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);

        try {
            $stmt->execute();

        } catch (PDOException $e) {

            exit('登録失敗' . $e->getMessage());
        }
    }
}