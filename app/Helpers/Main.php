<?php

function forCalendar($datetime){
    foreach ($datetime as $k=>$v)
    {
        $end = date($datetime[$k]['date'], strtotime('+'.$datetime[$k]['event_duration'].' hours'));
        $datetime[$k]['title'] = $datetime[$k]['event_name'];
        $datetime[$k]['start'] = $datetime[$k]['date'];
        $datetime[$k]['end'] = $end;
        $datetime[$k]['constraint'] = 'businessHours';
        $datetime[$k]['borderColor'] = '#FC6180';
        $datetime[$k]['backgroundColor'] = '#FC6180';
        $datetime[$k]['textColor'] = '#fff';
        unset($datetime[$k]['event_name']);
        unset($datetime[$k]['date']);
        unset($datetime[$k]['detail_event']);
        unset($datetime[$k]['event_duration']);
        unset($datetime[$k]['event_type']);
    }
    return json_encode($datetime);
}
