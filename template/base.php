<?php
    $styles;

    switch (basename($_SERVER['PHP_SELF'])) {
        case 'registre.php':
            $styles = 'estils-registre.css';
            break;
        case 'contacte.php':
            $styles = 'estils-contacte.css';
            break;
    }
?>
