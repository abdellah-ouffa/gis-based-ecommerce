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

	if(!function_exists('existsOnBasket')) {
		function existsOnBasket($productId) {
			$exists = Cart::search(function ($cartItem, $rowId) use ($productId) {
		        return $cartItem->id === $productId;
		    });
		    return $exists->isNotEmpty();
		}
	}

	if(!function_exists('calcDateDiffYears')) {
		function calcDateDiffYears($from, $to) {
			$diff = abs(strtotime($to) - strtotime($from));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			return $years;
		}
	}

	if(!function_exists('getYearsMonthsBetweenTwoDates')) {
		function getYearsMonthsBetweenTwoDates($from, $to) {
			$monthsYears = [];
			$tmp = $from;
			$from = $from > $to ? $to : $from;
			$to = $tmp > $to ? $tmp : $to;
			$start    = new DateTime($from);
			$start->modify('first day of this month');
			$end      = new DateTime($to);
			$end->modify('first day of next month');
			$interval = DateInterval::createFromDateString('1 month');
			$period   = new DatePeriod($start, $interval, $end);

			foreach ($period as $dt) {
			    $monthsYears[] = [
			    	'y' => $dt->format("Y"),
			    	'm' => $dt->format("m")
			    ];
			}

			return $monthsYears;
		}
	}

	if(!function_exists('getPartOfDate')) {
		function getPartOfDate($date, $part = 0, $delimiter = '-') {
			return explode($delimiter, $date)[$part];
		}
	}



