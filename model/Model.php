<?php

require_once ('conf/Database.php');

/**
 * Class Model
 */
abstract class Model
{

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Model constructor.
     */
    public function __construct()
    {

        try {
            $this->pdo = new PDO(
                sprintf('mysql:host=%s;dbname=%s;charset=utf8',DataBase::HOST_NAME,DataBase::DB_NAME),
                DataBase::DB_USER,
                DataBase::DB_PASSWORD,
                [
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );

        } catch (PDOException $e) {

            exit('データベース接続失敗。' . $e->getMessage());
        }
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

}