<?php

/**
 * Class CategoryValidation
 */
class CategoryValidation
{
    /**
     * @param $name
     * @return array
     */
    public function addValidation($name){

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