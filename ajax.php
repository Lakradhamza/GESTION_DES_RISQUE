<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if ($action == 'login') {
	$login = $crud->login();
	if ($login)
		echo $login;
}
if ($action == 'login2') {
	$login = $crud->login2();
	if ($login)
		echo $login;
}
if ($action == 'logout') {
	$logout = $crud->logout();
	if ($logout)
		echo $logout;
}
if ($action == 'logout2') {
	$logout = $crud->logout();
	if ($logout)
		echo $logout;
}

if ($action == 'signup') {
	$save = $crud->signup();
	if ($save)
		echo $save;
}
if ($action == 'save_user') {
	$save = $crud->save_user();
	if ($save)
		echo $save;
}
if ($action == 'update_user') {
	$save = $crud->update_user();
	if ($save)
		echo $save;
}
if ($action == 'delete_user') {
	$save = $crud->delete_user();
	if ($save)
		echo $save;
}
if ($action == 'save_actif') {
	$save = $crud->save_actif();
	if ($save)
		echo $save;
}
if ($action == 'delete_actif') {
	$save = $crud->delete_actif();
	if ($save)
		echo $save;
}
if ($action == 'save_Vulnérabilité') {
	$save = $crud->save_Vulnérabilité();
	if ($save)
		echo $save;
}
if ($action == 'delete_Vulnérabilité') {
	$save = $crud->delete_Vulnérabilité();
	if ($save)
		echo $save;
}
if ($action == 'save_mesure') {
	$save = $crud->save_mesure();
	if ($save)
		echo $save;
}
if ($action == 'delete_mesure') {
	$save = $crud->delete_mesure();
	if ($save)
		echo $save;
}
if ($action == 'get_report') {
	$get = $crud->get_report();
	if ($get)
		echo $get;
}
if ($action == 'save_home') {
	$save = $crud->save_home();
	if ($save)
		echo $save;
}
if ($action == 'delete_home') {
	$save = $crud->delete_home();
	if ($save)
		echo $save;
}
ob_end_flush();
