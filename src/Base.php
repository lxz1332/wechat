<?php

namespace cwkj\money;

use think\facade\Db;

class Base {

    public function postXml($url, $postfields) {
        $isdir = ROOT_PATH . 'certklsdfjas213/';
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = false; //是否重定向
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS] = $postfields;
        $params[CURLOPT_SSL_VERIFYPEER] = false;
        $params[CURLOPT_SSL_VERIFYHOST] = false;
        curl_setopt($ch, CURLOPT_SSLCERT, $isdir . 'apiclient_cert.pem'); //证书位置
        curl_setopt($ch, CURLOPT_SSLKEY, $isdir . 'apiclient_key.pem'); //证书位置
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
        return $content;
    }

}
