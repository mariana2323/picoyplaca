<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 3:49 PM
 */

defined('BASEPATH') || exit('No direct script access allowed');

class RestrictionController extends CI_Controller
{

  public function index()
  {
    $this->load->view('restriction_view');
  }

  public function calculateRestriction()
  {
    $data = $this->input->get();
    $format = 'Y-m-d';
    $placa = $data["plate"];
    $fecha = date($format, strtotime($data["datea"]));
    $hora = date('H:i', strtotime($data["timea"]));
    $fecha1 = date($format, strtotime('2010-04-28'));
    $fecha2 = date($format, strtotime('2019-07-31'));
    $fecha3 = date($format, strtotime('2020-03-28'));
    $fecha4 = date($format, strtotime('2020-04-06'));
    $fecha5 = date($format, strtotime('2020-06-01'));
    $dia = h_dia_fecha($fecha);
    $digito = substr($placa, -1);
    $result = "";
    $res1 = "You can circulate the date: / Usted si puede salir el día: ";
    $res2 = " at: / a las: ";
    $res3 = "Remember, you can not circulate on: / Recuerda, no puedes circular el día: ";
    if ($fecha < $fecha1)
    {
      $result = 'There was not "Pico y Placa" at that period/ No existió Pico y Placa en esa fecha.';
    }
    //1. Identify the period/ Identificar el periodo
    //Since April 28, 2010 "Pico y Placa" started/ Desde el 28 de abril del 2010 el Pico y Placa comenzó
    //The time range was from 7:00am to 9:30am and 16:00pm to 19:30pm/ El rango de horario aplicaba desde las 7:00am a 9:30am y 16:00pm a 19:30pm
    //Can not circulate/No circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha1 && $fecha < $fecha2)
    {
      $verifica = h_test_pico_placa_inicial($digito, $dia, $hora);
      if ($verifica)
      {
        $result = $res1 . $fecha . $res2 . $hora;
      }
      else
      {
        $diano = h_get_pico_placa_inicial($digito);
        $result = $res3 . h_nombre_dia($diano) . $res2 . $hora;
      }
    }
    //In July 31, 2019 "Pico y Placa" changed it´s name to "Hoy no circula"/ El 31 de julio del 2019 el Pico y Placa cambió a "Hoy no circula"
    //The time range was from 5:00am to 20:00pm/ El rango de horario aplicaba desde las 5:00am a 20:00pm
    //Can not circulate/No circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha2 && $fecha < $fecha3)
    {
      $verifica = $this->testHoyNoCircula($digito, $dia, $hora);
      if ($verifica)
      {
        $result = $res1 . $fecha . $res2 . $hora;
      }
      else
      {
        $diano = h_get_pico_placa_inicial($digito);
        $result = $res3 . h_nombre_dia($diano) . $res2 . $hora;
      }
    }
    //Due the COVID-19 pandemic, "Hoy no circula" changed as a Vehicular Restriction in March 28, 2020/ Debido a la pandemia de Covid-19, el "Hoy no circula" cambió a una restricción vehicular desde el 28 de marzo del 2020
    //The time range was from 5:00am to 14:00pm
    //Can circulate/Circulan: Monday/Lunes & Friday/Viernes: 1, 2, 3; Tuesday/Martes & Saturday/Sábado: 4, 5, 6; Wednesday/Miércoles & Sunday/Domingo: 7, 8, 9; Monday/Lunes & Thursday/Jueves: 0
    //
    elseif ($fecha >= $fecha3 && $fecha < $fecha4)
    {
      $verifica = $this->testVehicularRestriction1($digito, $dia, $hora);
      if ($verifica)
      {
        $result = $res1 . $fecha . $res2 . $hora;
      }
      else
      {
        $result = $res3 . $fecha . $res2 . $hora;
      }
    }
    //Due the Covid-19 pandemic, vehicular restriction changed in April 6, 2020/ Debido a la pandemia de Covid-19, la restricción cambió el 6 de abril del 2020
    //The time range was from 5:00am to 14:00pm
    //Can circulate/Circulan: Monday/Lunes: 1 y 2; Tuesday/Martes: 3 y 4; Wednesday/Miércoles: 5 y 6; Thursday/Jueves: 7 y 8; Friday/Viernes: 9 y 0
    //
    elseif ($fecha >= $fecha4 && $fecha < $fecha5)
    {
      $verifica = $this->testVehicularRestriction2($digito, $dia, $hora);
      if ($verifica)
      {
        $result = $res1 . $fecha . $res2 . $hora;
      }
      else
      {
        $diano = h_get_pico_placa_inicial($digito);
        $result = "Remember, you can circulate on: / Recuerda, puedes circular el día: " . h_nombre_dia($diano) . $res2 . $hora;
      }
    }
    //Due the Covid-19 pandemic, vehicular restriction changed in June 1, 2020 because yellow traffic light/ Debido a la pandemia de Covid-19, la restricción cambió el 1 de junio del 2020 por el semáforo amarillo
    //The time range was from 5:00am to 21:00pm
    //Can circulate/Circulan: Lunes, Miércoles, Viernes: 1, 3, 5, 7, 9; Martes, Jueves, Sábado: 2, 4, 6, 8, 0
    //
    elseif ($fecha >= $fecha5)
    {
      $verifica = $this->testVehicularRestriction3($digito, $dia, $hora);
      if ($verifica)
      {
        $result = $res1 . $fecha . $res2 . $hora;
      }
      else
      {
        $diano = $this->getVehicularRestriction3($digito);
        $result = "Remember, you can circulate on: / Recuerda, puedes circular los días: " . implode(", ", $diano) . $res2 . $hora;
      }
    }
    $this->load->view('mensaje_view', array("data" => $result));
  }

  /**
   * @param $digito
   * @param $dia
   * @param $hora
   * @return bool
   */
  public function testHoyNoCircula($digito, $dia, $hora)
  {
    $dianum = h_get_pico_placa_inicial($digito);
    if ($dia != $dianum)
    {
      return true;
    }
    else
    {
      return !($hora >= date('H:i', strtotime('05:00')) && $hora <= date('H:i', strtotime('20:00')));
    }
  }

  /**
   * @param $digito
   * @param $dia
   * @param $hora
   * @return bool
   */
  public function testVehicularRestriction1($digito, $dia, $hora)
  {
    $verf = false;
    switch ($digito)
    {
      case "1":
      case "2":
      case "3":
        if ($dia == 1 || $dia == 5)
        {
          $verf = true;
        }
        break;
      case "4":
      case "5":
      case "6":
        if ($dia == 2 || $dia == 6)
        {
          $verf = true;
        }
        break;
      case "7":
      case "8":
      case "9":
        if ($dia == 0 || $dia == 3)
        {
          $verf = true;
        }
        break;
      case "0":
        if ($dia == 1 || $dia == 4)
        {
          $verf = true;
        }
        break;
    }
    if ($verf)
    {
      return ($hora >= date('H:i', strtotime('05:00')) && $hora <= date('H:i', strtotime('14:00')));
    }
    else
    {
      return false;
    }
  }

  /**
   * @param $digito
   * @param $dia
   * @param $hora
   * @return bool
   */
  public function testVehicularRestriction2($digito, $dia, $hora)
  {
    $dianum = h_get_pico_placa_inicial($digito);
    if ($dia == $dianum)
    {
      return ($hora >= date('H:i', strtotime('05:00')) && $hora <= date('H:i', strtotime('14:00')));
    }
    else
    {
      return false;
    }
  }

  /**
   * @param $digito
   * @param $dia
   * @param $hora
   * @return bool
   */
  public function testVehicularRestriction3($digito, $dia, $hora)
  {
    $verf = false;
    if ($digito % 2 == 0 && $dia % 2 == 0)
    {
      return true;
    }
    if ($verf)
    {
      return ($hora >= date('H:i', strtotime('05:00')) && $hora <= date('H:i', strtotime('21:00')));
    }
    else
    {
      return false;
    }
  }

  /**
   * @param $digito
   * @return array
   */
  public function getVehicularRestriction3($digito)
  {
    $res = array();
    for ($i = 0; $i < 6; $i++)
    {
      if ($digito % 2 == 0)
      {
        if ($i % 2 == 0)
        {
          array_push($res, h_nombre_dia($i));
        }
      }
      else
      {
        if ($i % 2 != 0)
        {
          array_push($res, h_nombre_dia($i));
        }
      }
    }
    return $res;
  }
}