<?php
namespace App\Libraries;

/**
 * 豆瓣类库
 * Class douban
 * @package App\Libraries
 */
class Douban
{

    private static $base_url = 'https://api.douban.com/';

    /**
     * Movie API
     */

    /**
     * 搜索 豆瓣 api 电影
     */
    public static function movie_search($q='', $tag=''){
        // /v2/movie/search?q=张艺谋
        // /v2/movie/search?tag=喜剧
        if($q){
            $q = urlencode($q);
            $url = self::$base_url."/v2/movie/search?q=$q";
        }else if($tag){
            $url = self::$base_url."/v2/movie/search?tag=$tag";
        }else{
            return false;
        }
        $response = \Httpful\Request::get($url)
            ->expectsJson()
            ->send();
        if($response->code != 200){
            return false;
        }
        return $response->body;
    }

    /**
     * 获取 影视详情
     * @param $id
     * @return bool
     */
    public static function movie_subject($id){
        if(!$id){
            return false;
        }
        $url = self::$base_url."/v2/movie/subject/$id";
        $response = \Httpful\Request::get($url)
            ->expectsJson()
            ->send();
        if($response->code != 200){
            return false;
        }
        return $response->body;
    }
}