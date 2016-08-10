<?php
require_once 'vendor/microweber/screen/autoload.php'; 
if (!isset($_GET['url'])) {
    exit;
}
if (!isset($_GET['settings'])) {
    exit;
}
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
$screen = new Screen\Capture(addhttp($_GET['url']));


if (isset($_GET['settings'])) { // Width & Height
	$setting = explode("x", $_GET['settings']['0']); 
    $screen->setWidth(intval($setting[0]));
    $screen->setHeight(intval($setting[1]));
}
/*
if (isset($_GET['clipw'])) { // Clip Width
    $screen->setClipWidth(intval($_GET['clipw']));
}

if (isset($_GET['cliph'])) { // Clip Height
    $screen->setClipHeight(intval($_GET['cliph']));
}

if (isset($_GET['user-agent'])) { // User Agent String
    $screen->setUserAgentString($_GET['user-agent']);
}

if (isset($_GET['bg-color'])) { // Background Color
    $screen->setBackgroundColor($_GET['bg-color']);
}
*/
if (isset($_GET['format'])) { // Format
    $screen->setFormat($_GET['setting']['1']);
}

$fileLocation = 'result/test.' . $screen->getFormat();
$screen->save($fileLocation);

header('Content-Type:' . $screen->getMimeType());
header('Content-Length: ' . filesize($fileLocation));
readfile($fileLocation);
