<?php
if ($_SERVER['HTTP_X_ORIGINAL_URL'] === '127.0.0.1') {
    echo 'SALARY KITNA LOGE DISCUSS KARLE';
} else {
    http_response_code(403);
    echo 'PAGE CAN ONLY BE ACCESSED FROM INTERNAL NETWORK.';
}
?>
