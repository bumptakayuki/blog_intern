<?php


/**
 * Class PostValidation
 */
class PostValidation
{
    /**
     * @param $title
     * @param $description
     * @param $categoryId
     * @return array
     */
    public function addValidation($title, $description, $categoryId){

        $errors = [];

        if (empty($title)){
            $errors['title'] = 'タイトルがありません。<br>';
        }
        if (mb_strlen($title) > 80){
            $errors['title'] = 'タイトルが長すぎます。<br>';
        }
        if (empty($description)){
            $errors['description'] = '本文がありません。<br>';
        }
        return $errors;
    }
}