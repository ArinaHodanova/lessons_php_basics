<?
session_start();
require_once 'function.php';
require_once 'conf.php';

echo Session::flash('success');
?>
