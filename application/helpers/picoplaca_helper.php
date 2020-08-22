<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 5:23 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('h_get_pico_placa_inicial'))
{

  function h_get_pico_placa_inicial($digito)
  {
    if ($digito % 2 == 0)
    {
      $dianum = $digito / 2;
    }
    else
      $dianum = ($digito + 1) / 2;
    return $dianum;
  }
}
if (!function_exists('h_test_pico_placa_inicial'))
{

  function h_test_pico_placa_inicial($digito, $dia, $hora)
  {
    $dianum = h_get_pico_placa_inicial($digito);
    if ($dia != $dianum)
    {
      return true;
    }
    else
    {
      if (($hora >= date('H:i', strtotime('07:00')) && $hora <= date('H:i', strtotime('09:30'))) || ($hora >= date('H:i', strtotime('16:00')) && $hora <= date('H:i', strtotime('19:30'))))
      {
        return false;
      }
      else return true;
    }
  }
}