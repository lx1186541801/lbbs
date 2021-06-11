<?php 

namespace App\Handlers;

use Illuminate\Support\Str;

/**
 * 	图片上传类
 */

class ImageUploadHandler 
{

	// 允许上传的类型文件
	protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];


	public function save($file, $folder, $file_prefix)
	{
		// 存储目录
		$folder_name = "uploads/images/$folder/" . date('Ym/d', time());

		// 物理目录
		// public_path()` 获取的是 `public` 文件夹的物理路径。
		$uploads_path = public_path() . '/' . $folder_name;

		// 文件后缀
		$ext = strtolower($file->getClientOriginalExtension()) ?: 'png';

		// 文件名称
		$filename = $file_prefix . '_' . date('Y_m_d_H_i_s', time()) . '_' . Str::random(10) . '.' . $ext;

		// 是否是允许的文件后缀
		if ( ! in_array($ext, $this->allowed_ext)) {
			return false;
		}

		// 移动文件到指定的文件目录
		$file->move($uploads_path, $filename);

		// 返回文件全路径
		return [
			'path' => config('app.url') . "/$folder_name/$filename"
		];
	}
}