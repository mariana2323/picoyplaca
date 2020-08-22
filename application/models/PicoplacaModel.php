<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 9:31 PM
 */

class PicoplacaModel extends CI_Model
{
  public function getDiasSemana()
  {
    return array('Sunday/Domingo', 'Monday/Lunes', 'Tuesday/Martes', 'Wednesday/Miércoles', 'Thursday/Jueves', 'Friday/Viernes', 'Saturday/Sábado');
  }
}