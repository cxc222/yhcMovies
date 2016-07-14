<?php

namespace App\Jobs;

use Log;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract;

class Test extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ArticleRepositoryContract $articleRepositoryContract)
    {
        //
        //Log::info('This is some useful information.');
        $res = $articleRepositoryContract->checkArticle(65);
        print_r($res);
        die;
    }
}
