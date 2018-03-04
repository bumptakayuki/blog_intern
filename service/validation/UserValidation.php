<?php

/**
 * Class UserValidation
 */
class UserValidation
{
    /**
     * @param $name
     * @return array
     */
    public function addValidation($name){

        $errors = [];

        if (empty($name)){
            $errors['username'] = 'カテゴリ名がありません。<br>';
        }
        if (mb_strlen($name) > 80){
            $errors['username'] = 'カテゴリ名が長すぎます。<br>';
        }
        return $errors;
    }
}