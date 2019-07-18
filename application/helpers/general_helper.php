<?php 

function setView($uri,$title = 'Sistem Penanganan Pesanan', $data = [])
{
    $CI = &get_instance();     
    $data['title'] = $title;
    $CI->load->view('baseLayout/header', $data);  
    $CI->load->view($uri, $data) ; 
    $CI->load->view('baseLayout/footer');
}

function render($uri,$title = 'Sistem Penanganan Pesanan', $data = [])
{
    $CI = &get_instance(); 
    $data['title'] = $title;
    $CI->load->view('baseLayout/header', $data);  
    $CI->load->view('partial/navbar', $data);
    $CI->load->view('partial/sidebar', $data);
    $CI->load->view($uri, $data); 
    $CI->load->view('baseLayout/footer');
}

function dd($data)
{
    die(var_dump($data));
}

function formatDate($data)
{
    return date("d-m-Y", strtotime($data));
}

?>