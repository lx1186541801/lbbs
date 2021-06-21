<?php 

namespace App\Handlers;

use Str;
use Image;


/**
 * 	图片上传类
 */

class ImageUploadHandler 
{

	// 允许上传的类型文件
	protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];


	public function save($file, $folder, $file_prefix, $max_width = false)
	{
		// 存储目录
		$folder_name = "uploads/images/$folder/" . date('Ym/d', time());

		// 物理目录
		// public_path()` 获取的是 `public` 文件夹的物理路径。
		$uploads_path = public_path() . '/' . $folder_name;

		// 文件后缀
		$ext = strtolower($file->getClientOriginalExtension()) ?: 'png';

		// 文件名称
		$filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $ext;

		// 是否是允许的文件后缀
		if ( ! in_array($ext, $this->allowed_ext)) {
			return false;
		}

		// 移动文件到指定的文件目录
		$file->move($uploads_path, $filename);


		if ($max_width && $ext != 'gif') {
			$this->reduceSize($uploads_path . '/' . $filename, $max_width);
		}

		// 返回文件全路径
		return [
			'path' => config('app.url') . "/$folder_name/$filename"
		];
	}


	public function reduceSize($file_path, $max_width)
	{
		// 获取对象，参数为图片的物理路径
		$image = Image::make($file_path);

		// 进行大小调整
		$image->resize($max_width, null, function ($constraint) {

			// 设置宽度为$max_width 等比例缩放
			$constraint->aspectRatio();

			// 防止裁图时图片尺寸变大
			$constraint->upsize();

		});

		// 保存
		$image->save();

	}
}