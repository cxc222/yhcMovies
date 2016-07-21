<?php

namespace App\Jobs;

use Log;
use App\Jobs\Job;
use App\Jobs\Baidu;
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
            $res = $this->checkArticle($data['id']);
            if(!$res){
                //失败 记录日志中
                Log::error('collection error: check article error. id: '.$data['id']);
            }else{
                //提交到百度
                $url = route('cms.detail', ['id' => $data['id'] ]);
                $job = (new Baidu($url));
                dispatch($job);
            }
        }
    }

    public function checkArticle($id){
          try{
              $this->articleRepositoryContract->checkArticle($id);
          }catch (ModelNotFoundException $e){

          }
        return ;
    }

    //队列任务失败执行此方法
    public function failed()
    {
        //Log::error("fail send to ".$this->name);
    }
}
