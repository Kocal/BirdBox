<?php
$files = [
	'program' => __DIR__ . '/../programme',
	'stream' => __DIR__ . '/../stream'
];

if(!isset($_GET['file']) || !isset($files[$_GET['file']])) {
	header('Location: /');
	die();
}

highlight_file($files[$_GET['file']]);
