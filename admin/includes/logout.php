<?php
//Kill session
session_start();
session_unset();
session_destroy();
header("Location: ../s.php?auth=masuk");
