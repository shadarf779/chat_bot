<?php


session_start();
unset($_SESSION['chat_log']);
header('Location: index.php?History = Deleted');

