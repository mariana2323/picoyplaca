<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 12:31 PM
 */
$estilo = file_get_contents(base_url() . 'css/estilo.css');
$html = "<style>$estilo</style>";
$html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />';
$html .= '<div>
              <a href="'.base_url().'picoplacacontroller" class="btn btn-success">Pico y Placa</a>
              <a href="'.base_url().'restrictioncontroller" class="btn btn-success">Restricción vehicular (Pandemia)</a>
          </div>';
echo $html;
