<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract;

class TestCheckArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:checkArticle {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ArticleRepositoryContract $articleRepositoryContract)
    {
        //
        $id = $this->argument('id');
        $res = $articleRepositoryContract->checkArticle($id);
        if(!$res){
            //失败 记录日志中
            Log::info('test collection error: check article error.');
        }
    }
}
