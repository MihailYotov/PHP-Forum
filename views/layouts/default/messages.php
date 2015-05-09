<?php
if (isset($_SESSION['messages'])) {
    echo '<ul class="infoMessages clearfix">';
    foreach ($_SESSION['messages'] as $msg) {
        echo '<li class="' . $msg['type'] . '">';
        echo '<h3>' . htmlspecialchars($msg['text']) . '</h3>';
        echo '</li>';
    }
    echo '</ul>';
    unset($_SESSION['messages']);
}
