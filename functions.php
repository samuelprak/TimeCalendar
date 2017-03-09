<?php 

function generateUrl($urlEts, $resources){
    $icalUrl = $urlEts;
    $icalUrl = str_replace("{}", $resources, $icalUrl);
    $icalUrl .= "&firstDate=2016-09-02&lastDate=2017-08-31";
    return $icalUrl;
}