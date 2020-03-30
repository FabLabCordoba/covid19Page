<?php

// Creamos un array de 2 dimensiones, donde ponemos el nombre de la pronvicia y el KEY de MercadoPago asociado a la misma
$provincias = [
    'Cordoba' => 'APP_USR-3773199923955631-032723-f3d951ba68866d3f78e8e060877cb0a5-538652796',
    'Salta' => 'APP_USR-7942801942852899-032923-1b0a5f8142b01fd8013317b60ff16b16-127233352',
    // aca pueden agregar mas usando el mismo formato de la linea de arriba
];

// Definimos un array para los montos, ademas agregar una ultima opcion llamada custom que permite elegir el monto personalizado
$montos = array(
    '50', '100', '150', '200', 'custom'
);

// Home
$homepage = 'https://www.makersargentina.com';

// Creamos una variable y consumimos el parametro 'pagina' que le pasamos por GET, con esto vamos a determinar donde estamos
$current_page = (isset($_GET['pagina']) ? $_GET['pagina'] : 'home');

// Definimos configuraciones para cada pagina
if ($current_page == 'home' || empty($current_page)) {
    $titulo = 'Makers Argentina COVID-19';
    $hero_title = 'Makers Argentina COVID-19';
    $hero_picture = '/img/hero/mask.png';
    $hero_picture_position = 'left';
    $hero_description = 'Somos una comunidad de makers de todo el pais que trabajamos en la fabricamos de insumos para los medicos que se encuentran tratando pacientes relacionados la la pandemia COVID-19. Actualmente estamos fabricando mascarillas para los médicos.';
    $hero_cta = 'Colaborar';
    $hero_cta_link = '/colaborar';
    $template = 'homepage.html';
} elseif ($current_page == 'colaborar') {
    $titulo = 'Fabricar para Makers Argentina COVID-19';
    $hero_title = 'Quiero Colaborar';
    $hero_picture = '/img/hero/hands.svg';
    $hero_picture_position = 'right';
    $hero_description = 'Con tu ayuda podemos conseguir más materiales para seguir imprimiendo.<br/><br/>También podes colaborar directamente con los insumos , con lo que te vamos a pedir que entres en contacto.';
    $hero_cta = NULL;
    $hero_cta_link = NULL;
    $template = 'colaborar.php';
} elseif ($current_page == 'fabricar') {
    $titulo = 'Fabricar para Makers Argentina COVID-19';
    $hero_title = 'Quiero Fabricar';
    $hero_picture = '/img/hero/printer.svg';
    $hero_picture_position = 'right';
    $hero_description = 'Estamos imprimiendo el modelo de mascarillas Prusa RC2. Hasta ahora es el modelo mas validado por lo que unificamos criterios y todos fabricaremos los mismos. Descarga el KIT con lo necesario para comenzar a imprimir.';
    $hero_cta = 'Descargar Kit';
    $hero_cta_link = 'https://drive.google.com/drive/folders/1tttMYXtlJQ4jdKnupENm1-IAnplpR1dh?fbclid=IwAR2A0HtSKfFSJs2XmlGsqHTrgZTv5oIjvfII5T0mu6zEzFZoj3zdpm1ZMkI';
    $template = 'fabricar.html';
} else {
    // Si no es ninguna pagina, vamos al home
    header("Location: " . $homepage);
}