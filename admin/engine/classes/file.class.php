﻿<?php
if(!defined('CMS'))die('Сюда нельзя');
class file {
    public $image,
            $count = 0;
    // Перемешиваем строку $alphabet, потом выбираем первые $length символов
    function generateNameFile($length = 6, $alphabet = '1234657890abcdefghijklmnopqrstuvwxyz1234567890')
        {
            return substr(str_shuffle($alphabet), 0, $length);
        }
        
    function isImage($image) {
        $this->image = getimagesize($image);
        if($this->image == FALSE) {
            return false;
        }
        switch ($this->image[2]) {
            case 1:
                return '.gif';
                break;
            case 2:
                return '.jpg';
                break;
            case 3:
                return '.png';
                break;
            default:
                return false;
                break;
        }
    }
    
    function ListFile($arr) {
        if (empty($arr['code']))    return '<span class="message">Изображения не загружены<br /> Перенесите изображения сюда. <br /><i>(они сразу же появятся в тесте)</i></span>';
        $files = json_decode($arr['code']);
        $this->count = count($files);
        $i = 1;
        foreach ($files as $k => $v) {
            $html_code .= '<div class="preview done" id="'.$i.'">
                <span class="imageHolder" id="img_'.$i.'">
                    <img src="../uploads/tests/'.$arr['test'].'/c_'.$v->path.'" />
                    <span class="uploaded"></span>
                </span></div><input type="hidden" id="path_'.$i.'" name="path_'.$i.'" value="'.$v->path.'" />';
            $i++;
        }
        return $html_code;
    }    
    
    /***********************************************************************************
    Функция img_resize(): генерация thumbnails
    Параметры:
      $src             - имя исходного файла
      $dest            - имя генерируемого файла
      $width, $height  - ширина и высота генерируемого изображения, в пикселях
    Необязательные параметры:
      $rgb             - цвет фона, по умолчанию - белый
      $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
    ***********************************************************************************/
    function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=85)
    {
      if (!file_exists($src)) return false;

      $size = getimagesize($src);

      if ($size === false) return false;

      // Определяем исходный формат по MIME-информации, предоставленной
      // функцией getimagesize, и выбираем соответствующую формату
      // imagecreatefrom-функцию.
      $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
      $icfunc = "imagecreatefrom" . $format;
      if (!function_exists($icfunc)) return false;

      $x_ratio = $width / $size[0];
      $y_ratio = $height / $size[1];

      $ratio       = min($x_ratio, $y_ratio);
      $use_x_ratio = ($x_ratio == $ratio);

      $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
      $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
      $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
      $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

      $isrc = $icfunc($src);
      $idest = imagecreatetruecolor($width, $height);

      imagefill($idest, 0, 0, $rgb);
      imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
        $new_width, $new_height, $size[0], $size[1]);

      imagejpeg($idest, $dest, $quality);

      imagedestroy($isrc);
      imagedestroy($idest);

      return true;

    }
}
$file = new file;
?>
