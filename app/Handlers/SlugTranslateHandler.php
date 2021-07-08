<?php 

namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;

/**
 *  Slug 翻译类
 */
class SlugTranslateHandler
{
	public function translate($text)
	{
		
		$http = new Client();

		$apiUrl = config('services.translate_api.baidu.apiUrl');
		$appid = config('services.translate_api.baidu.appid');
		$key = config('services.translate_api.baidu.key');
		$salt = time();

		if (empty($appid) || empty($key)) {
			return $this->pinyin($text);
		}

		// 根据文档  生成  签名
		$sign = md5($appid . $text . $salt . $key);

		// 构建请求
		$query = http_build_query([
			'q'	=>	$text,
			'from'	=>	'zh',
			'to'	=>	'en',
			'appid'	=>	$appid,
			'salt'	=>	$salt,
			'sign'	=>	$sign,
		]);


		$res = $http->get($apiUrl . $query);

		$result = json_decode($res->getBody(), true);

		if (isset($result['trans_result'][0]['dst'])) {
			return \Str::slug($result['trans_result'][0]['dst']);
		} else {
			return $this->pinyin($text);
		}
	}


	public function pinyin($text)
	{
		return \Str::slug(app(Pinyin::class)->permalink($text));
	}

}

