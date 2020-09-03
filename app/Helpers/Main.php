<?php

function forCalendar($datetime){
    foreach ($datetime as $k=>$v)
    {
        $end = date($datetime[$k]['date'], strtotime('+'.$datetime[$k]['event_duration'].' hours'));
        $datetime[$k]['title'] = $datetime[$k]['event_name'];
        $datetime[$k]['start'] = $datetime[$k]['date'];
        $datetime[$k]['end'] = $end;
        $datetime[$k]['rendering'] = 'background';
        $datetime[$k]['borderColor'] = '#39ADB5';
        $datetime[$k]['textColor'] = '#fff';
        unset($datetime[$k]['event_name']);
        unset($datetime[$k]['date']);
    }
    return json_encode($datetime);
}
