<?php

/**
 * vkCoverClass
 * by GoldFreddy
 * 
 * This class sets the cover for the VK community
 * To use this class, you need Curl!
 */

class coverVk {
	private $groupId, $token;

	/**
	 *
	 * Class constructor
	 * 
	 * @param integer $groupId - Sets community identifier
	 * @param string  $token - Sets the token
	 */
	public function __construct($groupId, $token)
	{
		$this->groupId = $groupId;
		$this->token = $token;
	}

	/**
	 *
	 * Gets the link for downloading the cover VK
	 *
	 * @param integer $cropX - X coordinate of the upper-left corner for cropping the image, default is 0
	 * @param integer $cropY - Y coordinate of the upper left corner for cropping the image, default is 0
	 * @param integer $cropX2 - X coordinate of the lower right corner for cropping the image, default is 795
	 * @param integer $cropY2 - Y-coordinate of the lower-right corner for image cropping, default 200
	 * @return string - Returns a link to load the cover
	 */
	public function getCoverUrl ($cropX = 0, $cropY = 0, $cropX2 = 795, $cropY2 = 200)
	{
		$params = http_build_query([
			'group_id' => $this->groupId,
			'crop_x' => $cropX,
			'crop_y' => $cropY,
			'crop_x2' => $cropX2,
			'crop_y2' => $cropY2,
			'access_token' => $this->token,
			'v' => '5.69'
		]);
		$data = file_get_contents("https://api.vk.com/method/photos.getOwnerCoverPhotoUploadServer?".$params);
		return json_decode($data)->response->upload_url;
	}

	/**
	 * 
	 * Uploads photos
	 * 
	 * @param  string $uploadUrl - Link to upload photos
	 * @param  string $photo - Photo
	 * @param  string $mimeType - Mime type photo
	 * @return array - Array with hash data and photo
	 */
	public function uploadPhoto ($uploadUrl, $photo, $mimeType = 'no')
	{
		
		if($mimeType == 'no')
		{
			$mimeType = mime_content_type($photo);
		}

		$data = [
			'photo' => new CURLFile($photo, $mimeType)
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $uploadUrl);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		return json_decode(curl_exec($ch), true);
	}

	/**
	 * 
	 * Sets the cover
	 * 
	 * @param  string $hash - The hash parameter, obtained as a result of the function uploadPhoto
	 * @param  string $photo - The photo parameter obtained as a result of the function uploadPhoto
	 * @return array - Returns an array of images of objects describing copies of the uploaded photo
	 */
	public function installCover ($hash, $photo)
	{
		$data = http_build_query([
			'hash' => $hash,
			'photo' => $photo,
			'access_token' => $this->token
		]);
		return json_decode(file_get_contents('https://api.vk.com/method/photos.saveOwnerCoverPhoto?'.$data));
	}
}