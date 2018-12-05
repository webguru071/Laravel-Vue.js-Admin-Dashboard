<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Helpers;
use App\Libraries\ImageResize;

class MediaController extends Controller
{
	/**
     * Upload Files
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

    public function upload(Request $request)
    {
    	$file = $request->file('file');
    	$newFileName = Helpers::reformatFileName($file->getClientOriginalName());
    	$image = new ImageResize($file);
    	$image->crop(180, 180);
    	$image->save('product-images/' . $newFileName);

		$arr = [
			'file_name' => $newFileName,
			'file_size' => filesize('product-images/' . $newFileName),
			'file_type' => $file->getMimeType(),
			'file_thumbnail' => in_array($file->getMimeType(), ['image/png', 'image/jpg', 'image/jpeg']) ? asset('product-images/' . $newFileName) : ''
		];

		return response()->json($arr)->header('Content-Type', 'text/html');
    }

    /**
     * List of Uploaded Files
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

    public function getFiles(Request $request)
	{
		$uploadDirectory = "product-images/";
		$files = scandir($uploadDirectory, 1);
		$page = $_GET['page'];
		$filesPerPage = $_GET['files_per_page'];
		$search = $_GET['search_file'];
		$formattedFiles = [];

		foreach ($files as $key => $file) {
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $uploadDirectory . $file);
			finfo_close($finfo);

			if ($mime != 'directory') {
				if (!empty($search)) {
					if (strpos($file, $search) !== false) {
						$formattedFiles[] = [
							'file_name' => $file,
							'file_size' => filesize($uploadDirectory . $file),
							'file_type' => $mime,
							'file_thumbnail' =>  in_array(explode('/', $mime)[1], ['png', 'jpg', 'jpeg']) ? asset($uploadDirectory . $file) : ''
						];
					}
				} else {
					$formattedFiles[] = [
						'file_name' => $file,
						'file_size' => filesize($uploadDirectory . $file),
						'file_type' => $mime,
						'file_thumbnail' =>  in_array(explode('/', $mime)[1], ['png', 'jpg', 'jpeg']) ? asset($uploadDirectory . $file) : ''
					];
				}
			}
		}

		$arrPaginated = array_slice($formattedFiles, (($page * $filesPerPage) - $filesPerPage), $filesPerPage);
		return response()->json([
			'files' => $arrPaginated,
			'total' => count($formattedFiles)
		])->header('Content-Type', 'text/html');
	}
}