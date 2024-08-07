<?php

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

function getsetting($cache, array $value)
{
    // Cache::forget($cache);
    $settings = Cache::rememberForever($cache, function () use ($value) {
        return Setting::whereIn('key', $value)->get();
    });

    $set =  $settings->pluck('value', 'key')->toarray();
    $data = array_map(function ($value) {
        if ($value === null) {
            return '';
        }
        return $value === null ? '' : $value;
    }, $set);
    return $data;
}
function Resp($data = null, $msg = null, $status = 200, $statusval = true)
{
    if ($status == 422) {
        return response()->json(['errors' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } elseif ($status != 200) {
        return response()->json(['msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } else {
        return response()->json(['data' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval], $status);
    }
}

function path($course_id, $folder)
{
    $p =  '/files' . '/' . $folder . '/' . $course_id . '/';
    $path = asset($p);
    if (!File::exists($path)) {
        mkdir($path, 0777, true);
    }
    return  $path . '/';
}
// function getSetting($key, $default = null)
// {
//     $setting = Setting::find($key);
//     return $setting ? $setting->value : $default;
// }

if (!function_exists('getSetting')) {
    function getSetting()
    {
        try {
            return app('getSetting');
        } catch (Exception $exception) {
            return false;
        }
    }
}
if (!function_exists('uploadfile')) {
    function uploadfile($file, $filePath)
    {

        $extension =  $file->getClientOriginalExtension();
        $str_random = Str::random(4);
        $filename = $str_random .'_' . time() .'.'. $extension;
        $file->storeAs($filePath, $filename, 'files');
        return $filename;
    }
}
