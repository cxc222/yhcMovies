<?php

namespace App\Jobs;

use Log;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cms\Collection\Article as CollectionArticle;
use App\Models\Cms\Article\Article;
use App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract;

class SendCheckArticles extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $articleRepositoryContract;

    /**
     * Create a new job instance.
     *
     * @param CollectionArticle $collectionArticle
     */
    public function __construct(ArticleRepositoryContract $articleRepositoryContract)
    {
        //
        $this->articleRepositoryContract = $articleRepositoryContract;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($obj, $data)
    {
        //
        if(isset($data['id']) && !empty($data['id'])){
            $res = $this->articleRepositoryContract->checkArticle($data['id']);
            if(!$res){
                //失败 记录日志中
                Log::info('collection error: check article error. id: '.$data['id']);
            }
        }
    }

    /**
     * 参与测试 test
     *
     */
    public function test(){
        $res = $this->articleRepositoryContract->checkArticle(3);
        if(!$res){
            //失败 记录日志中
            Log::info('test collection error: check article error.');
        }
    }
}
