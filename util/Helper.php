<?php

function getInfo($name) {
    return (isset($_REQUEST[$name]) ? $_REQUEST[$name] : "");
}