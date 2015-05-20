<?php
defined('geo') or die('Access denied');
session_start();
require_once MODEL;

class Controller {
	public $model;
	public $view;
	function __construct()
	{
		$this -> view = new View();
	}
	function action_index()
	{
	}
}
//$name_cat = get_cat((int)$_GET['cat']);
$view = empty($_GET['view']) ? 'news' : $_GET['view'];
$mod=new Model();
switch ($view){
case 'contact':
    $name_cat = $mod->get_cat((int)$_GET['cat']);
    $comm = $mod->comment((int)$_GET['cat']);
    $comments=$mod->Com_plus_User($comm);
    break;
case 'news':

    $new = $mod->news();
    break;
default :
    $view='news';
    
}
require_once TAMPLATE.'index.php';
?>
