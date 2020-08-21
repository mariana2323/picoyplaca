<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 12:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class PicoplacaController extends CI_Controller
{
  public function index()
  {
    $this->load->view('picoplaca_view');
  }

  public function calculaPicoPlaca($placa, $fecha, $hora)
  {
    $fecha = date('Y-m-d', strtotime($fecha));
    $fecha1 = date('Y-m-d', strtotime('2010-04-28'));
    $fecha2 = date('Y-m-d', strtotime('2019-07-31'));
    $fecha3 = date('Y-m-d', strtotime('2020-03-28'));
    $fecha4 = date('Y-m-d', strtotime('2020-04-06'));
    $fecha5 = date('Y-m-d', strtotime('2020-06-01'));
    $dia = h_dia_fecha($fecha);
    $digito = substr($placa, -1);
    if ($fecha <= $fecha1)
    {

    }
    //1. Identify the period/ Identificar el periodo
    //Since April 28, 2010 "Pico y Placa" started/ Desde el 28 de abril del 2010 el Pico y Placa comenzó
    //The time range was from 7:00am to 9:30am and 16:00pm to 19:30pm/ El rango de horario aplicaba desde las 7:00am a 9:30am y 16:00pm a 19:30pm
    //Can not circulate/No circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha1 && $fecha < $fecha2)
    {

    }
    //In July 31, 2019 "Pico y Placa" changed it´s name to "Hoy no circula"
    //The time range was from 5:00am to 20:00pm/ El rango de horario aplicaba desde las 5:00am a 20:00pm
    //Can not circulate/No circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha2 && $fecha < $fecha3)
    {

    }
    //Due the COVID-19 pandemic, "Hoy no circula" changed as a Vehicular Restriction in March 28, 2020/ Debido a la pandemia de Covid-19, el "Hoy no circula" cambió a una restricción vehicular desde el 28 de marzo del 2020
    //The time range was from 5:00am to 14:00pm
    //Can circulate/Circulan: Monday/Lunes & Friday/Viernes: 1, 2, 3; Tuesday/Martes & Saturday/Sábado: 4, 5, 6; Wednesday/Miércoles & Sunday/Domingo: 7, 8, 9; Monday/Lunes & Thursday/Jueves: 0
    //
    elseif ($fecha >= $fecha3 && $fecha < $fecha4)
    {

    }
    //Due the Covid-19 pandemic, vehicular restriction changed in April 6, 2020/ Debido a la pandemia de Covid-19, la restricción cambió el 6 de abril del 2020
    //The time range was from 5:00am to 14:00pm
    //Can circulate/Circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha4 && $fecha < $fecha5)
    {

    }
    //Due the Covid-19 pandemic, vehicular restriction changed in June 1, 2020 because yellow traffic light/ Debido a la pandemia de Covid-19, la restricción cambió el 1 de junio del 2020 por el semáforo amarillo
    //The time range was from 5:00am to 21:00pm
    //Can circulate/Circulan: Lunes, Miércoles, Viernes: 1, 3, 5, 7, 9; Martes, Jueves, Sábado: 2, 4, 6, 8, 0
    //
    elseif ($fecha >= $fecha5)
    {

    }
  }

  /**
   * @param $placa
   * @param $fecha
   * @param $hora
   */
  public function getPicoPlacaInicial($digito, $dia, $hora)
  {
    if ($digito % 2 == 0)
    {
      $dianum = $digito / 2;
    }
    else
      $dianum = ($digito + 1) / 2;
    if ($dia === $dianum)
      return true;
    else
      return false;
  }

  public function getHoyNoCircula($placa, $fecha, $hora)
  {

  }

  public function getVehicularRestriction1($placa, $fecha, $hora)
  {

  }

  public function getVehicularRestriction2($placa, $fecha, $hora)
  {

  }

  public function getVehicularRestriction3($placa, $fecha, $hora)
  {

  }
}