<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    //

	public function created(Reply $reply)
	{
        $reply->topic->reply_count = $reply->topic->replies->count();

        $reply->topic->save();
	}


	public function creating(Reply $reply)
	{
		$reply->content = clean($topic->content, 'user_topic_body');
	}
}
