<?php

function forCalendar($datetime){
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
        } else {
            $datetime[$k]['borderColor'] = '#93BE52';
            $datetime[$k]['backgroundColor'] = '#93BE52';
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

function daysDifference($firstDate, $secondDate) {
    $datediff = strtotime($secondDate) - strtotime($firstDate);
    return round($datediff / (60 * 60 * 24));
}

function get_x_months_to_the_future( $base_time = null, $months = 1 )
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
