<?php
/**
 * @copyright Copyright (c) 2018. MckenzieArts
 * @author    Mckenziearts <contact@mckenziearts.design>
 * @link      https://www.camer-freelancer.com
 * @since     7.1
 * @version   1.0
 * @package   CF/Helpers
 */

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class MediaHelper
{
    /**
     * @protected
     *
     * @var string $dir, the file uploaded path
     */
    protected static $dir = 'app/public';

    /**
     * @return string
     */
    public static function getUploadsFolder()
    {
        return self::$dir;
    }

    /**
     * @return string
     */
    public static function getStoragePath()
    {
        return storage_path(self::$dir);
    }

    /**
     * Return the size of an image
     *
     * @param string $file
     * @param string $folder
     * @return array $width and $height of the file give in parameter
     */
    public static function getFileSizes(string $file, string $folder = null)
    {
        if ($folder) {
            list($width, $height, $type, $attr) = getimagesize(storage_path(self::$dir.'/'. $folder .'/'. date('FY') .'/'.$file));
        }
        list($width, $height, $type, $attr) = getimagesize(storage_path(self::$dir.'/'. date('FY') .'/'.$file));

        return [
            'width'     => $width,
            'height'    => $height
        ];
    }

    /**
     * resize, To rezise and image
     *
     * @param string    $file,      l'image à redimmensionner
     * @param int       $width,     la largeur à laquelle on doit redimensionner l'image
     * @param int       $height,    la hateur à laquelle on doit redimensionner l'image
     * @param string    $filepath,  le chemin ou est garder le fichier redimensionner
     */
    public static function resize($file, $width, $height, $filepath)
    {
        Image::make($file)->resize($width, $height)->save($filepath);
    }

    /**
     * getImageWeight, permet de retourner le poids d'une image
     *
     * @param $octets
     * @return string
     */
    public static function getImageWeight($octets) {
        $resultat = $octets;
        for ($i = 0; $i < 8 && $resultat >= 1024; $i++) {
            $resultat = $resultat / 1024;
        }
        if ($i > 0) {
            return preg_replace('/,00$/', '', number_format($resultat, 2, ',', ''))
                . ' ' . substr('KMGTPEZY', $i-1, 1) . 'o';
        } else {
            return $resultat . ' o';
        }
    }
}
