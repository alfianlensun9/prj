<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$viewControllerUri = 'viewController/C_view/';
$actControllerUri = 'actController/C_actions/';

$route['default_controller'] = 'Redirect';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = $viewControllerUri.'login';
$route['homepage'] = $viewControllerUri.'homepage';
$route['orderBarang'] = $viewControllerUri.'orderBarang';
$route['orderBarangDetail/(:any)'] = $viewControllerUri.'orderBarangDetail/$1';
$route['getRincianDetail'] = $viewControllerUri.'getRincianDetail';
$route['masterBarang'] = $viewControllerUri.'masterBarang';
$route['masterJurusan'] = $viewControllerUri.'masterJurusan';
$route['otentikasi'] = $viewControllerUri.'otentikasi';
$route['purcaseOrder/(:any)'] = $viewControllerUri.'purcaseOrder/$1';


$route['cekLogin'] = $actControllerUri.'cekLogin';
$route['logout'] = $actControllerUri.'logout';
$route['createAkun'] = $actControllerUri.'createAkun';
$route['createMasterBarang'] = $actControllerUri.'createMasterBarang';
$route['createMasterJurusan'] = $actControllerUri.'createMasterJurusan';
$route['createPesanan'] = $actControllerUri.'createPesanan';
$route['createPesananDetail'] = $actControllerUri.'createPesananDetail';
$route['hapusPesanan'] = $actControllerUri.'hapusPesanan';
$route['hapusMasterBarang'] = $actControllerUri.'hapusMasterBarang';
$route['hapusMasterJurusan'] = $actControllerUri.'hapusMasterJurusan';
$route['kirimPesanan'] = $actControllerUri.'kirimPesanan';
$route['createRincianPesanan']  = $actControllerUri.'createRincianPesanan';
$route['konfirmasiRincianPesanan']  = $actControllerUri.'konfirmasiRincianPesanan';

