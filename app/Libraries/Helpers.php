<?php 

namespace App\Libraries;

class Helpers {

	public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) { 
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

	public static function reformatFileName($fileName)
	{
		$arrFileName 	= explode('.', $fileName);
		$countArr 		= count($arrFileName);
		$newFileName 	= '';

		for ($z = 0; $z <= $countArr - 2; $z++) {
			$newFileName .= $arrFileName[$z] . '.';
		}

		$newFileName 	= str_replace(' ', '', $newFileName);
		$newFileName 	= strtolower($newFileName);
		$fileName 		=  $newFileName . date("d-m-Y_H-i-s") . '.' . $arrFileName[$countArr - 1];

		return $fileName;		
	}
	
}
