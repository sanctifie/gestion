<?php
session_start();
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous etes maintenant déconnecter';
header('location: login.php');
