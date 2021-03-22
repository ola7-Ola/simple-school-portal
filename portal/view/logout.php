<?php
    // destroy user session
    session_start();
    session_unset();
    session_destroy();
    header('location: ../');
    die;
