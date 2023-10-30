<?php

    use Coco\constants\ConstantsManager;

    require '../vendor/autoload.php';

    const PUBLIC_PATH = '/public/';

    ConstantsManager::initSystemConstants();

    $res = ConstantsManager::getAllConstants();

    var_export($res);

