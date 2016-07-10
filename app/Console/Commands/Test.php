<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\BaiduSeo;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

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
    public function handle()
    {
        //$response = BaiduSeo::push(['http://mv.yhec.cn/']);
        //$this->info(print_r($response, true));

        $url = route('cms.detail', ['id' => 1 ]);

        $this->info($url);
    }
}
