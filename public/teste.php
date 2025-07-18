<?php
unset($_SESSION["name"]);
echo isset($_SESSION['name']) ? 'sessão existe ' . $_SESSION['name'] : 'sessão não existe';
echo "<br> <pre>";
echo isset($_SESSION['person']) ? var_dump($_SESSION['person']) : "sessão não existe";