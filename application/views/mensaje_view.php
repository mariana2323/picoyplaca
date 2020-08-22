<?php
/**
 * Created by PhpStorm.
 * User: mariana23
 * Date: 8/21/2020
 * Time: 5:12 PM
 */
$html = '<title>Resultado</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <div class="alert alert-info" role="alert">'.$data.'</div>';
$html .= "<script>alert('".$data."')</script>";
$html .= '<a href="'.base_url().'" class="btn btn-success">Back/ Volver</a>';
echo $html;