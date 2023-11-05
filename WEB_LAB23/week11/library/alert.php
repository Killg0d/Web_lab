<?php
function alert($message, $redirectUrl = '') {
    echo "<script>alert('$message');";
    
    // Check if a redirect URL is provided
    if (!empty($redirectUrl)) {
        echo "window.location.href = '$redirectUrl';";
    }
    
    echo "</script>";
}
?>