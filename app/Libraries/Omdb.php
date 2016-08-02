<?php
namespace App\Libraries;

/**
 * http://www.omdbapi.com/ 文档地址
 * Class Omdb
 * @package App\Libraries
 */
class Omdb
{
    private static $base_url = 'http://www.omdbapi.com/';

    /**
     * 搜索电影
     */
    static function search($t){
        $parameter['type'] = 'movie';
        $parameter['plot'] = 'full';
        $parameter['tomatoes'] = 'true';
        if($t){
            $t = urlencode($t);
            $parameter['t'] = $t;
            $url_param = http_build_query($parameter);
            $url = self::$base_url.'?'.$url_param;
            $response = \Httpful\Request::get($url)
                ->expectsJson()
                ->send();
            if($response->code != 200){
                return false;
            }
            $body = $response->body;
            if($body->Response == false || $body->Response == 'False'){
                return false;
            }
            return $body;
        }
        return false;
    }
}