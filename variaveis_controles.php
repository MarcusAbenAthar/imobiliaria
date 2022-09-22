<?php
require_once 'controller/ImovelController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/GaleriaController.php';
$galeriaController = new GaleriaController();
$imovelController = new ImovelController();
$usuarioController = new UsuarioController();
$imovel = new Imovel();
$galeria = new galeria();
$usuario = new usuario();