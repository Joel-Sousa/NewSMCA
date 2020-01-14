<?php

session_start();
session_destroy();

$msg = "Tu saiu Manezao!";
header("location: ../index.php?msg={$msg}");
