<?php
session_start();

/**
 * Class Controller
 */
abstract class Controller
{

    /**
     * Controller constructor.
     */
    function __construct()
    {
        if(empty($_SESSION['user'])) {
            header("Location: ./login");
            exit;
        }
    }
}