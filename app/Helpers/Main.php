<?php

function forCalendar($datetime){
    foreach ($datetime as $k=>$v)
    {
        $datetime[$k]['title'] = $datetime[$k]['event_name'].' - '.$datetime[$k]['event_details'];
        $datetime[$k]['start'] = $datetime[$k]['event_start'];
        $datetime[$k]['end'] = $datetime[$k]['event_end'];
        $datetime[$k]['constraint'] = 'businessHours';
        $datetime[$k]['borderColor'] = '#FC6180';
        $datetime[$k]['backgroundColor'] = '#FC6180';
        $datetime[$k]['textColor'] = '#fff';
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
