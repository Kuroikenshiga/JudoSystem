<?php
    if(!isset($_SESSION['idAcademia'])){
       // header('location: index.php?class=user&method=logoutError');
       ?>
       <script>
            window.location.href = "index.php?class=user&method=logoutError";
       </script>
    <?php
    }
?>