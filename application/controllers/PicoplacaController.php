<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 12:42 PM
 */
defined('BASEPATH') || exit('No direct script access allowed');

class PicoplacaController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PicoplacaModel');
  }

  public function index()
  {
    $dias = $this->PicoplacaModel->getDiasSemana();
    $this->load->view('picoplaca_view', array("dias" => $dias));
  }

  public function calculatePicoPlaca()
  {
    $data = $this->input->get();
    $placa = $data["plate"];
    $dia = $data["dia"];
    $hora = date('H:i', strtotime($data["timea"]));
    $digito = substr($placa, -1);
    $result = "";
    $verifica = h_test_pico_placa_inicial($digito, $dia, $hora);
    if ($verifica)
    {
      $result = "You can circulate the date: / Usted si puede salir el día: " . h_nombre_dia($dia) . " at: / a las: " . $hora;
    }
    else
    {
      $diano = h_get_pico_placa_inicial($digito);
      $result = "Remember, you can not circulate on: / Recuerda, no puedes circular el día: " . h_nombre_dia($diano) . " at: / a las: " . $hora;
    }
    $this->load->view('mensaje_view', array("data" => $result));
  }

}