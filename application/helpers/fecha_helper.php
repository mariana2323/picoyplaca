<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 12:50 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('h_nombre_dia_fecha'))
{

  function h_nombre_dia_fecha($fecha)
  {
    $dias = array('Sunday/Domingo', 'Monday/Lunes', 'Tuesday/Martes', 'Wednesday/Miércoles', 'Thursday/Jueves', 'Friday/Viernes', 'Saturday/Sábado');
    $dd = explode('-', $fecha);
    $ts = mktime(0, 0, 0, $dd[1], $dd[2], $dd[0]);
    $diafecha = $dias[date('w', $ts)];
    return $diafecha;
  }
}
if (!function_exists('h_dia_fecha'))
{

  function h_dia_fecha($fecha)
  {
    $dd = explode('-', $fecha);
    $ts = mktime(0, 0, 0, $dd[1], $dd[2], $dd[0]);
    return date('w', $ts);
  }
}