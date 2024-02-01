<?php
$user = $user ?? null;
setcookie('user', $user['name'], time() - 3600, "/");
header('Location: /');
