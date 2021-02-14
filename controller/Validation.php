<?php
ini_set('display_errors', 1);

class Validation {

    //未入力チェック
    function blankCheck($value)
    {
        return empty($value);
    }

    // メール形式チェック
    function emailCheck($value)
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    // 文字数制限(4〜10文字)
    function length4_10Check($value)
    {
        if(($value < 4) or ($value > 10)) {
            return true;
        } else {
            return false;
        }
    }

    // 文字数制限(〜50文字)
    function length50Check($value)
    {
        if($value > 50) {
            return true;
        } else {
            return false;
        }
    }

    // 使用不可文字チェック
    function typeCheck($value)
    {
        if (!preg_match("/^[A-Za-z0-9_]+$/",$value)) {
            return true;
        } else {
            return false;
        }
    }
}
