<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    //
	public function saving(Topic $topic)
	{

		// 过滤body  防止 XSS 攻击
		$topic->body = clean($topic->body, 'user_topic_body');

		$topic->excerpt = make_excerpt($topic->body);



	}


	public function saved(Topic $topic)
	{
		if ( ! $topic->slug) {
			// $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
			
			// 推送任务 到 队列
			dispatch(new TranslateSlug($topic));
		}
	}



	public function deleted(Topic $topic)
	{
		\DB::table('replies')->where('topic_id', $topic->id)->delete();
	}

}
