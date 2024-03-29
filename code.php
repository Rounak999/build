<?php
if (isset($_SERVER['HTTP_X_REMOTE_IP']) && $_SERVER['HTTP_X_REMOTE_IP'] === '127.0.0.1') {
    echo 'SALARY KITNA LOGE DISCUSS KARLE';
} else {
    http_response_code(403);
    echo 'PAGE CAN ONLY BE ACCESSED FROM INTERNAL NETWORK.';
}
?>

