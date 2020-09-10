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
