<?php

function forCalendar($datetime)
{
    foreach ($datetime as $k => $v)
    {
        $datetime[$k]['title'] = $datetime[$k]['event_name'];
        $datetime[$k]['start'] = $datetime[$k]['event_start'];
        $datetime[$k]['end'] = $datetime[$k]['event_end'];
        $datetime[$k]['constraint'] = 'businessHours';
        if ($datetime[$k]['event_type'] == 'One Time') {
            $datetime[$k]['borderColor'] = '#FC6180';
            $datetime[$k]['backgroundColor'] = '#FC6180';
            $datetime[$k]['textColor'] = '#fff';
        } else if ($datetime[$k]['event_type'] == 'Recurring Monthly') {
            $datetime[$k]['borderColor'] = '#4680ff';
            $datetime[$k]['backgroundColor'] = '#4680ff';
            $datetime[$k]['textColor'] = '#fff';
        } else if ($datetime[$k]['event_type'] == 'Recurring Yearly') {
            $datetime[$k]['borderColor'] = '#93BE52';
            $datetime[$k]['backgroundColor'] = '#93BE52';
            $datetime[$k]['textColor'] = '#fff';
        }
        if (strpos($datetime[$k]['event_name'], 'Cuti:') !== false) {
            $datetime[$k]['borderColor'] = '#FFB64D';
            $datetime[$k]['backgroundColor'] = '#FFB64D';
            $datetime[$k]['textColor'] = '#fff';
        }
        unset($datetime[$k]['event_name']);
        unset($datetime[$k]['event_start']);
        unset($datetime[$k]['event_end']);
        unset($datetime[$k]['event_details']);
        unset($datetime[$k]['event_type']);
    }
    return json_encode($datetime);
}

function timeForHuman($input_date, $status_hms = NULL) {
    $time = strtotime($input_date);
    switch($status_hms) {
        case "standard":
            $view_time = date("d M Y", $time);
            break;
        case "timeOnly":
            $view_time = date("h:i", $time);
            break;
        case "current":
            $view_time = date("l jS Y, h:i A", $time);
            break;
        case "current_month":
            $view_time = date("l jS, h:i A", $time);
            break;
        default:
            $view_time = date("d M Y - H:m:s", $time);
            break;
    }
    return $view_time;
}

function dateDifference($date_1, $date_2, $differenceFormat)
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format($differenceFormat);
}

function getXMonthsToTheFuture( $base_time = null, $months = 1 )
{
    if (is_null($base_time))
        $base_time = time();

    $x_months_to_the_future    = strtotime( "+" . $months . " months", $base_time );

    $month_before              = (int) date( "m", $base_time ) + 12 * (int) date( "Y", $base_time );
    $month_after               = (int) date( "m", $x_months_to_the_future ) + 12 * (int) date( "Y", $x_months_to_the_future );

    if ($month_after > $months + $month_before)
        $x_months_to_the_future = strtotime( date("Ym01His", $x_months_to_the_future) . " -1 day" );

    return $x_months_to_the_future;
}

function createGetDriveFolder($dirName)
{
    Storage::cloud()->makeDirectory($dirName);
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));

    $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $dirName)
        ->first(); // There could be duplicate directory names!
    return $dir['path'];
}

function updateDriveFolder($directoryEmpId, $directoryEmpName, $destinationName)
{
    // Now find that directory and use its ID (path) to rename it
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));

    $directory = $contents
        ->where('type', '=', 'dir')
        ->where('filename', '=', $directoryEmpId.'-'.$directoryEmpName)
        ->first(); // there can be duplicate file names!

    Storage::cloud()->move($directory['path'], $directoryEmpId.'-'.$destinationName);
}

function deleteDriveFileInFolder($folderName, $fileName)
{
    // Now find that file and use its ID (path) to delete it
    $dir = '/'.$folderName;
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));

    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!
    // Check if there's a file, then delete it!
    if (!empty($file)) {
        Storage::cloud()->delete($file['path']);
    }
}

function deleteDriveFolder($directoryName)
{
    Storage::cloud()->deleteDirectory($directoryName);
}
