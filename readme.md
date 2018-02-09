## vkCoverClass

This class sets the cover for the VK community

To use this class, you need Curl!
## Documentation

1. Require Class

	`require_once 'vkCoverClass.php';`
2. Create VK object
	
	`$vk = new CoverVK ({GROUP_ID}, {TOKEN});`
3. Get a link for downloading the cover

	`$url = $vk->getCoverUrl({CROP_X}, {CROP_Y}, {CROP_X2}, {CROP_Y2});`
4. Download the cover to the VK server
	
	`$load = $vk->uploadPhoto($url, {PHOTO});`
5. Set the cover to your group

	`$vk->installCover($load['hash'], $load['photo']);`
## Example

	`require_once 'vkCoverClass.php';`

	`$vk = new CoverVK ('100367807','TlpaIQ4EHnOxUxUmdq7ttclTzql');`

	`$url = $vk->getCoverUrl(0, 0, 1590, 400);`

	`$load = $vk->uploadPhoto($url, 'cover.png');`

	`$vk->installCover($load['hash'], $load['photo']);`
## Variables

	{GROUP_ID} - Group Numeric Id

	{TOKEN} - User Token with rights photos

	{CROP_X} - The X coordinate of the upper-left corner for cropping an image.

	{CROP_Y} - The Y coordinate of the upper-left corner for cropping an image.

	{CROP_X2} - The X coordinate of the lower right corner for cropping an image.

	{CROP_Y2} - The Y coordinate of the lower right corner for cropping an image.

	{PHOTO} - Name of the cover file
## License

	Copyright (c) 2018 GoldFreddy

	This license is authorized by the person who has received a copy of this software and related documentation (hereinafter referred to as the "Software"), to use the Software without restriction, including unlimited right to use, copy, modify, merge, publish, distribute, sublicense and / or sale of copies of the Software, as well as persons to whom this Software is provided, subject to the following conditions:

	The above copyright notice and these conditions must be included in all copies or significant portions of this Software.

	THIS SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT, BUT NOT LIMITED TO THEM. IN NO EVENT SHALL AUTHORS OR LEGAL ENTITIES BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHERWISE, INCLUDING WITH THE CONTRACT, TORT OR OTHERWISE ARISING OUT OF THE USE OF THE SOFTWARE OR OTHERWISE WITH THE SOFTWARE.
