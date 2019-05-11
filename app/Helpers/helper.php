<?php 
	use Carbon\Carbon;
	if(!function_exists('numberToPriceFormat')) {
	    /**
	     * @param null $number
	     * @return string
	     */
	    function numberToPriceFormat($number = null, $currency = 'DH', $toLeft = false) {
	        return ($toLeft) ? $currency . ' ' . number_format((float)$number, 2, '.', '') 
	        				 : number_format((float)$number, 2, '.', '') . ' ' . $currency;
	    }
	}
	if(!function_exists('dateToFrFormat')) {
	    /**
	     * Permet de formater la date vers la format françaices
	     * @param null $date
	     * @return string
	     */
	    function dateToFrFormat($date = null) {
	        return \Carbon\Carbon::parse($date)->format('d / m / Y');
	    }
	}
	if(!function_exists('getUrlFromRoute')) {
	    function getUrlFromRoute($route) {
	        return str_replace(Request::root() . '/', '', route($route));
	    }
	}
	if(!function_exists('saveFileFromRequest')) {
		function saveFileFromRequest($request, $fileInputName) {
		  	if($request->hasFile($fileInputName)) {
				$file = $request->file($fileInputName);
				$fileName = time() . '_' . $file->getClientOriginalName();
				return $file->storeAs('users_images', $fileName);
		  	} 
		  	return null;
		}
	}
	if(!function_exists('saveFile')) {
		function saveFile($file, $folderName) {
			$fileName = time() . '_' . $file->getClientOriginalName();
			return $file->storeAs($folderName, $fileName);
		}
	}
	if(!function_exists('removeFile')) {
		function removeFile($path) {
			if(file_exists('app/public/' . $path)) {
				unlink(storage_path('app/public/' . $path));
			}
		}
	}
	if(!function_exists('parseDate')) {
		function parseDate($date, $format = 'Y-m-d\TH:i:s') {
			return Carbon::parse($date)->format($format);
		}
	}