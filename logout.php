<?php

session_start();

session_unset();
session_destroy();

echo '
<script>
alert("Loggedout!");
window.location.href="Login.php";
</script>
';

?>