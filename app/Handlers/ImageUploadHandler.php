<?php 

namespace App\Handlers;

use Illuminate\Support\Str;

/**
 * 	
 */
class ImageUploadHandler 
{

	protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];


	public function save($file, $folder, $file_prefix)
	{
		$folder_name = "uploads/images/$folder/" . date('Ym/d', time());


		$uploads_path = public_path() . '' . $folder_name;

		$ext = strtolower($file->getClientOriginalExtendsion()) ?: 'png';

		$filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $ext;


		if ( ! in_array($ext, $this->allowed_ext)) {
			return false;
		}

		$file->move($uploads_path, $filename);

		return [
			'path' => config('app.url') . "/$uploads_path/$filename"
		];
	}
}