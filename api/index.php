<?php
// Get the requested path
$path = $_SERVER['REQUEST_URI'] ?? '/';

// Remove query string
$path = parse_url($path, PHP_URL_PATH);

// Map routes to your existing files
if ($path === '/' || $path === '/login') {
    require_once __DIR__ . '/../index.php';
} elseif ($path === '/home') {
    require_once __DIR__ . '/../home.php';
} elseif (file_exists(__DIR__ . '/..' . $path . '.php')) {
    require_once __DIR__ . '/..' . $path . '.php';
} elseif (file_exists(__DIR__ . '/..' . $path)) {
    // Serve static files
    $filepath = __DIR__ . '/..' . $path;
    $mime_types = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'images/png',
        'jpg' => 'images/jpeg',
        'jpeg' => 'images/jpeg',
        'gif' => 'images/gif',
        'svg' => 'images/svg+xml',
        'json' => 'application/json'
    ];
    
    $extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
    if (isset($mime_types[$extension])) {
        header('Content-Type: ' . $mime_types[$extension]);
    }
    readfile($filepath);
} else {
    // 404 Not Found
    http_response_code(404);
    echo '404 Not Found';
}
?>