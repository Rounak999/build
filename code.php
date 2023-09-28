<?php
if ($_SERVER['HTTP_X_ORIGINAL_URL'] === '127.0.0.1') {
    echo 'LEET';
} else {
    echo '403 FORBIDDEN. PAGE CAN ONLY BE ACCESSED FROM INTERNAL NETWORK.';
}
?>
