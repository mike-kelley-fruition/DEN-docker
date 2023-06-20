<?php

foreach (glob(dirname(__FILE__) ."/functions/*.php") as $filename) {
    require_once $filename;
}

