<?php

require_once('Model.php');

/**
 * Class PostModel
 */
class UserModel extends Model
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
     * @param $username
     * @param $email
     * @param $password
     */
    public function add($username, $email, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        try {
            $stmt->execute();

        } catch (PDOException $e) {

            exit('登録失敗' . $e->getMessage());
        }
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT email, password
                FROM users
                WHERE  email= :email');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        try {
           $stmt->execute();
            $user = $stmt->fetchAll();

        } catch (PDOException $e) {

            exit('登録失敗' . $e->getMessage());
        }

        // ハッシュ化されたパスワードがマッチするかどうかを確認
        if (password_verify($password, $user[0]['password'])) {
            return $user;
        }else{
            return [];
        }
    }
}