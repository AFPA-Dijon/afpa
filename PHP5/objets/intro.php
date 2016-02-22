<?php
/* A common problem, manipulating dates with PHP */

/* setting timezome*/
date_default_timezone_get("Europe/Paris");
/* creating new date as string: year-month-day format */
$date = "2016-02-22";
/* retrieving 'Y-m-d' formatted date as integer (timestamp) & adding 3 months and 4 days to it */
$newDate = date('Y-m-d',strtotime($date."+3 months +4 days"));
/* echo as d-m-Y formatted date (converting back from integer to string) */
echo date('d/m/Y', strtotime($newDate)); //26/05/2016

/* DOCS
http://php.net/manual/en/function.strtotime.php 
http://php.net/manual/en/function.date.php 
*/
echo '<br />';

/* now with functions... */

function addDays($date, $format, $days){
    return date($format,strtotime($date."+".$days." days"));
}
function addMonths($date, $format, $months){
    return date($format,strtotime($date."+".$months." months"));
}
function formatDate($date, $format){
    return date($format, strtotime($date));
}

$format = 'Y-m-d';
$date = "2016-02-22";
$date = addDays($date, $format, 4);
$date = addMonths($date, $format, 3);
echo formatDate($date, 'd/m/Y');
/* = thousands of tedious heavy-parametrized functions catalog, one for every problem to solve...*/
/* good luck finding the one you need */


/*now with objects...*/
$date = new MyDate( "2016-02-22", 'Y-m-d' );
$date->addDays(4);
$date->addMonths(3);
echo $date->format('d/m/Y');
/* perfectly understandable code, well organized (every object has its own set of functions)  */