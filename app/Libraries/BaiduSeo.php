<?php
namespace App\Libraries;

/**
 * 百度SEO 推送到 map
 * Class BaiduSeo
 * @package App\Libraries
 */
class BaiduSeo
{
    private static $url = "http://data.zz.baidu.com/urls?site=www.yhec.cn&token=ZymctLnBB16qbeDw";

    public static function push($body){
        $body = json_encode($body);
        $response = \Httpful\Request::post(self::$url)
            ->addHeader('Content-Type', 'text/plain')
            ->body($body)
            ->send();
        return $response->body;
    }
}