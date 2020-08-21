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


}