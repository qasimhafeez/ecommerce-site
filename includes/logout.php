<?php session_start(); ?>
<?php
    $_SESSION['user_id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['user_role'] = null;
    echo '<script>window.location.href = "../index.php"</script>';
?>