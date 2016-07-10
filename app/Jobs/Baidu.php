<?php
namespace App\Jobs;

use Log;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Libraries\BaiduSeo;

/**
 * 百度相关的类库
 * Class Baidu
 * @package App\Jobs
 */
class Baidu extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $urls = [];

    /**
     * Create a new job instance.
     *
     */
    public function __construct($url)
    {
        //
        if(!is_array($url)){
            $this->urls[] = $url;
        }
        $this->urls = $url;
    }

    /**
     * 推送 数据到 sitemap
     */
    public function handle(){
        if($this->urls){
            $this->request($this->urls);
        }
    }

    private function request($urls){
        return BaiduSeo::push($urls);
    }
}