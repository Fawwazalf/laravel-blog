<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ConvertContentImageBase64ToUrl
{
    protected function convertContentImageBase64ToUrl($content)
    {
        $pattern = '/<img[^>]+src="(data:image\/[^;]+;base64,[^"]+)"/i';
        preg_match_all($pattern, $content, $matches);

        foreach ($matches[1] as $base64Image) {
            [$meta, $base64Data] = explode(',', $base64Image);

            
            preg_match('/data:image\/(.*?);base64/', $meta, $extMatches);
            $extension = $extMatches[1] ?? 'png'; 

            $decodedImage = base64_decode($base64Data);
            $fileName = 'content_images/' . uniqid() . '.' . $extension;

            Storage::disk('public')->put($fileName, $decodedImage);

            $url = '/storage/' . $fileName;
            $content = str_replace($base64Image, $url, $content);
        }

        return $content;
    }

    public function setAttribute($key, $value)
    {
        if (isset($this->contentName) && $key === $this->contentName) {
            $value = $this->convertContentImageBase64ToUrl($value);
        }

        return parent::setAttribute($key, $value);
    }
}
