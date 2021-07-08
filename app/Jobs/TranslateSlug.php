<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;



class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $topic;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 请求翻译接口翻译
        $slug = app(SlugTranslateHandler::class)->translate($this->topic->title);

        // 避免死循环 直接操作数据库
        \DB::table('topics')->where('id', $this->topic->id)->update(['slug' =>  $slug]);
    }
}
