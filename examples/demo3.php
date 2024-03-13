<?php

    use Coco\constants\ConstantsManager;

    require '../vendor/autoload.php';

    const PUBLIC_PATH    = 'public/';
    const FILE_BASE_PATH = 'files/';
    const UPLOAD_PATH    = '<PUBLIC_PATH>upload/';
    const DOC_PATH       = '<UPLOAD_PATH>doc/';

    ConstantsManager::initSystemConstants();

    $res = ConstantsManager::getAllConstants(true);

    print_r($res);