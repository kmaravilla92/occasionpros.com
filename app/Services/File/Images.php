<?php

namespace App\Services\File;

use Image;

class Images
{

    const DEFAULT_PATH = 'storage/uploads/';

    public function getImage($imagePath = null)
    {
        $imagePathToCheck = sprintf(
            '%s%s',
            self::DEFAULT_PATH,
            $imagePath
        );

        if(file_exists($imagePathToCheck)) {
            return asset($imagePathToCheck);
        }
        return config('occ_pros.settings.users.profile_pic.default');
    }

    public function generateSizes($dirPath = null, $imagePath = null, $sections = [])
    {

        if(0 === count($sections)){
            return [
                'messages' => [
                    'No images were generated'
                ]
            ];
        }
        /*dd(
            $dirPath,
            file_exists($dirPath)
        );*/
        $extension = '.jpg';
        foreach($sections as $section => $section_config) {
            $width = isset($section_config['width']) ? $section_config['width'] : null;
            $height = isset($section_config['height']) ? $section_config['height'] : null;
            $image_new_name = $section_config['output_name'].$extension;
            $image = Image::make($imagePath);
            if(!is_null($width) && !is_null($height)){
                $image = $image->resize($width, $height);
            }
            $image = $image->save($dirPath.$image_new_name);
        }

        return [
            $dirPath,
            $imagePath,
            file_exists($imagePath),
            file_exists($dirPath)
        ];
    }
}