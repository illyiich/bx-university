<?php

ob_start();

echo '1';

echo '2';

$content = ob_get_clean();

echo '3';

var_dump($content);

exit;