<?php

function db(){
    $db = new mysqli('localhost', 'root', '', 'brave');
    return $db;
}
