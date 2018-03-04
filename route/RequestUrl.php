<?php

/**
 * Class RequestUrl
 */
class RequestUrl{

    /**
     * @return string
     */
    public function getBaseUrl(){

        $script_name = $_SERVER['SCRIPT_NAME'];
        $request_uri = $_SERVER['REQUEST_URI'];

        if(0 === strpos($request_uri, $script_name)){
            //フロントコントローラがURLに含まれる場合
            return $script_name;
        }elseif(0 === strpos($request_uri, dirname($script_name))){
            //フロントコントローラが省略されている場合
            return rtrim(dirname($script_name), '/');
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPathInfo(){

        $base_url = $this->getBaseUrl();
        $request_uri = $_SERVER['REQUEST_URI'];

        if(false !== ($pos = strpos($request_uri, '?'))){
            //GETパラメータを削除
            $request_uri = substr($request_uri, 0, $pos);
        }

        //REQUEST_URIからベースURLを取り除く
        $path_info = (string)substr($request_uri, strlen($base_url));

        return $path_info;
    }
}