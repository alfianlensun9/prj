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
$route['rincianProduk/(:any)'] = $viewControllerUri.'rincianProduk/$1';
$route['masterBarang'] = $viewControllerUri.'masterBarang';
$route['masterJurusan'] = $viewControllerUri.'masterJurusan';
$route['stockBarang'] = $viewControllerUri.'stockBarang';
$route['otentikasi'] = $viewControllerUri.'otentikasi';
$route['progress/(:any)'] = $viewControllerUri.'progress/$1';
$route['purcaseOrder/(:any)'] = $viewControllerUri.'purcaseOrder/$1';


$route['cekLogin'] = $actControllerUri.'cekLogin';
$route['logout'] = $actControllerUri.'logout';
$route['createAkun'] = $actControllerUri.'createAkun';
$route['createMasterBarang'] = $actControllerUri.'createMasterBarang';
$route['createMasterJurusan'] = $actControllerUri.'createMasterJurusan';
$route['createStockBarang'] = $actControllerUri.'createStockBarang';
$route['createPesanan'] = $actControllerUri.'createPesanan';
$route['createPesananDetail'] = $actControllerUri.'createPesananDetail';
$route['createPurcaseOrder/(:any)'] = $actControllerUri.'createPurcaseOrder/$1';
$route['createRincianProduk'] = $actControllerUri.'createRincianProduk';
$route['hapusPesanan'] = $actControllerUri.'hapusPesanan';
$route['hapusMasterBarang'] = $actControllerUri.'hapusMasterBarang';
$route['hapusMasterJurusan'] = $actControllerUri.'hapusMasterJurusan';
$route['kirimPesanan'] = $actControllerUri.'kirimPesanan';
$route['createRincianPesanan']  = $actControllerUri.'createRincianPesanan';
$route['konfirmasiRincianPesanan']  = $actControllerUri.'konfirmasiRincianPesanan';
$route['konfirmasiRincianProduk'] = $actControllerUri.'konfirmasiRincianProduk';
$route['konfirmasiPurcaseOrder/(:any)'] = $actControllerUri.'konfirmasiPurcaseOrder/$1';
$route['produksi'] = $actControllerUri.'produksi';
$route['createProgress'] = $actControllerUri.'createProgress';
$route['bayar'] = $actControllerUri.'bayar';