<?php

use App\Models\Profile;
use App\Models\Settings;


if (!function_exists('getProfile')) {
  function getProfile()
  {
    return Profile::latest()->get();
  }
}

if (!function_exists('appSetting')) {
  function appSetting()
  {
    return Settings::first();
  }
}


if (!function_exists('format_indo')) {
  function format_indo($date)
  {
    // array hari dan bulan
    $Hari = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    $Bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");


    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    // $waktu = substr($date, 11, 5);
    $hari = date("w", strtotime($date));
    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

    return $result;
  }
}

if (!function_exists('getInitial')) {
  function getInitial($name)
  {
    $firstName = strtok($name, ' ');
    $nameParts = explode(' ', $name);
    $initial = '';
    foreach ($nameParts as $key => $namePart) {
      if ($key < 2) {
        $initial .= strtoupper(substr($namePart, 0, 1));
      }
    }
    return $initial;
  }
}
if (!function_exists('timesInd')) {
  function timesInd($date)
  {
    $Bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

    return $result;
  }
}
function timesElapsed($datetime, $full = false)
{
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second',
  );

  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) {
    $string = array_slice($string, 0, 1);
    if (isset($string['d']) && $diff->d > 1) {
      $string['d'] = $diff->d . ' hari';
    }
  }

  return $string ? implode(', ', $string) . ' ago' : ($datetime == '' ? '-' : 'just uploaded');
}
if (!function_exists('encrypt_it')) {
  function encrypt_it($value)
  {
    $key = config('app.key');
    $cipher = 'AES-256-CBC';
    $iv = random_bytes(openssl_cipher_iv_length($cipher));

    $encryptedValue = openssl_encrypt($value, $cipher, $key, 0, $iv);

    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($iv . $encryptedValue));
  }
}

if (!function_exists('decrypt_it')) {
  function decrypt_it($encryptedValue)
  {
    $key = config('app.key');
    $cipher = 'AES-256-CBC';

    $data = base64_decode(str_replace(['-', '_'], ['+', '/'], $encryptedValue));

    $iv = substr($data, 0, openssl_cipher_iv_length($cipher));
    $encryptedValue = substr($data, openssl_cipher_iv_length($cipher));

    return openssl_decrypt($encryptedValue, $cipher, $key, 0, $iv);
  }
}

if (!function_exists('unFormatIDR')) {
  function unFormatIDR($value)
  {
    return preg_replace('/([^0-9])/i', '', $value);
  }
}

if (!function_exists('formatIDR')) {
  function formatIDR($value)
  {
    return "Rp" . number_format($value, 0, ',', '.');
  }
}
