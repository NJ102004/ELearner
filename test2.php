<?php
session_start();
// Generate a token or check additional conditions if needed
// ...

// Serve the protected video file
$videoPath = './meant not to be used\videos for testting\video1.mp4';
header('Content-Type: video/mp4');
header('Content-Length: ' . filesize($videoPath));
readfile($videoPath);
?>
