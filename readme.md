## vkCoverClass

This class sets the cover for the VK community

To use this class, you need Curl!
## Documentation

1. Require Class

	require_once 'vkCoverClass.php';
2. Create VK object
	
	$vk = new CoverVK ({GROUP_ID}, {TOKEN});
3. Get a link for downloading the cover

	$url = $vk->getCoverUrl({CROP_X}, {CROP_Y}, {CROP_X2}, {CROP_Y2});
4. Download the cover to the VK server
	
	$load = $vk->uploadPhoto($url, {PHOTO});
5. Set the cover to your group

	`$vk->installCover($load['hash'], $load['photo']);
## Example

	require_once 'vkCoverClass.php';

	$vk = new CoverVK ('100367807','TlpaIQ4EHnOxUxUmdq7ttclTzql');

	$url = $vk->getCoverUrl(0, 0, 1590, 400);

	$load = $vk->uploadPhoto($url, 'cover.png');

	$vk->installCover($load['hash'], $load['photo']);
## Variables

	{GROUP_ID} - Group Numeric Id

	{TOKEN} - User Token with rights photos

	{CROP_X} - The X coordinate of the upper-left corner for cropping an image.

	{CROP_Y} - The Y coordinate of the upper-left corner for cropping an image.

	{CROP_X2} - The X coordinate of the lower right corner for cropping an image.

	{CROP_Y2} - The Y coordinate of the lower right corner for cropping an image.

	{PHOTO} - Name of the cover file
## MIT License

Copyright (c) 2018 GoldFreddy

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.
