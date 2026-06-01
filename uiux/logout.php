<?php
session_start();

session_unset();


if (session_destroy()) {?>
    <script>
        document.location.href="index.php";
    </script>
<?php
}

?>