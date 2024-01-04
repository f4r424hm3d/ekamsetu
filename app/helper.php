<?php

// define('TO_EMAIL', 'studytutelage@gmail.com');
// define('TO_NAME', 'Team tutelage Study');
// define('CC_EMAIL', 'amanahlawat1918@gmail.com');
// define('CC_NAME', 'Aman Ahlawat');

define('TO_EMAIL', 'farazahmad280@gmail.com');
define('TO_NAME', 'Mohd Faraz');
define('BCC_EMAIL', 'farazahmad280@gmail.com');
define('BCC_NAME', 'Mohd Faraz');
define('CC_EMAIL', '4hm3df4r42@gmail.com');
define('CC_NAME', 'Tutelage Study');


if (!function_exists('printArray')) {
  function printArray($data)
  {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}
if (!function_exists('getFormattedDate')) {
  function getFormattedDate($date, $formate)
  {
    return date($formate, strtotime($date));
  }
}
if (!function_exists('slugify')) {
  function slugify($text)
  {
    // Swap out Non "Letters" with a -
    $text = preg_replace('/[^\\pL\d]+/u', '-', $text);
    // Trim out extra -'s
    $text = trim($text, '-');
    // Convert letters that we have left to the closest ASCII representation
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Make text lowercase
    $text = strtolower($text);
    // Strip out anything we haven't been able to convert
    $text = preg_replace('/[^-\w]+/', '', $text);
    return $text;
  }
}
if (!function_exists('dateDiff')) {
  function dateDiff($date1, $date2)
  {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    return $days_between = ceil(abs($date2_ts - $date1_ts) / 86400);
  }
}
if (!function_exists('aurl')) {
  function aurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/admin/' . $path);
    } else {
      return url('/admin/');
    }
  }
}
if (!function_exists('uurl')) {
  function uurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/user/' . $path);
    } else {
      return url('/user/');
    }
  }
}
if (!function_exists('j2s')) {
  function j2s($data)
  {
    $sm = $data != null ? json_decode($data) : '';
    return $sm = $sm != null ? implode(' , ', $sm) : '';
  }
}
if (!function_exists('replaceTag')) {
  function replaceTag($string, $array)
  {
    foreach ($array as $key => $value) {
      $string = $string == null ? null : str_replace('%' . $key . '%', $value, $string);
    }
    $string = trim(preg_replace('/\s+/', ' ', $string));
    $string = ucwords($string);
    return $string;
  }
}
if (!function_exists('universityLogo')) {
  function universityLogo($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('default/university-logo.png');
    }
  }
}
if (!function_exists('universityBanner')) {
  function universityBanner($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('default/university-banner.jpeg');
    }
  }
}
if (!function_exists('getPerc')) {
  function getPerc($mult, $div)
  {
    return $result = ($mult * 100) / $div;
  }
}
if (!function_exists('userIcon')) {
  function userIcon($path = null)
  {
    if ($path != null || $path != '') {
      return asset($path);
    } else {
      return asset('default/user.png');
    }
  }
}
if (!function_exists('finalFees')) {
  function finalFees($duration, $fees, $scholarship)
  {
    $totalFees = $duration * $fees;
    $dis = ($totalFees * $scholarship) / 100;
    $finalFees = $totalFees - $dis;
    return number_format($finalFees, 0);
  }
}
if (!function_exists('get_percentage_val')) {
  function get_percentage_val($percentage, $number)
  {
    $count1 = $percentage * $number;
    $count2 = $count1 / 100;
    $count = number_format($count2, 0);
    return $count;
  }
}
if (!function_exists('calc_final_fees')) {
  function calc_final_fees($duration, $fees, $scholarship, $scholarship_type)
  {
    $totalFees = $duration * $fees;
    if ($scholarship_type == 'AMOUNT') {
      $dis = $scholarship;
    } else {
      $dis = ($totalFees * $scholarship) / 100;
    }
    $finalFees = $totalFees - $dis;
    return number_format($finalFees, 0);
  }
}
if (!function_exists('getPageBreak')) {
  function getPageBreak($i)
  {
    if ($i % 2 == 0) {
      $msg = '<div class="page-break"></div>';
    } else {
      $msg = '';
    }
    return $msg;
  }
}
if (!function_exists('getPageBreak2')) {
  function getPageBreak2($i)
  {
    if ($i % 4 == 0) {
      $msg = '<div class="page-break"></div>';
    } else {
      $msg = '';
    }
    return $msg;
  }
}
