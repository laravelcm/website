<?php
/**
 * @copyright Copyright (c) 2018. MckenzieArts
 * @author    Mckenziearts <contact@mckenziearts.design>
 * @link      https://www.camer-freelancer.com
 */

namespace App\Traits;

use App\Helpers\MediaHelper;
use Illuminate\Http\UploadedFile;

trait UploadAction
{
    /**
     * Upload file to uploads folder
     *
     * @param UploadedFile $file
     * @param string|null $folder
     * @return string
     */
    public function upload(UploadedFile $file, string $folder = null)
    {
        $destinationPath =  is_null($folder) ?
            MediaHelper::getStoragePath() :
            MediaHelper::getStoragePath(). '/' .$folder. '/' .date('FY');
        $extension = $file->getClientOriginalExtension();

        $fileName = sha1(explode('.', $file->getClientOriginalName())[0]). '.' .$extension;

        $file->move($destinationPath, $fileName);
        $name = $folder. '/' .date('FY'). '/' .$fileName;

        return $name;
    }
}
