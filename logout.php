<?php

if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}


// header('refresh:1;location:index.php');

echo '<script>

window.location.href = "";

</script>';