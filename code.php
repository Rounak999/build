<?php
if ($_SERVER['HTTP_X_FORWARDED_FOR'] === '127.0.0.1') {
    echo 'LEET';
} else {
    http_response_code(403);
}
?>
