<?php

    use Coco\constants\ConstantsManager;
    use Coco\constants\Consts;

    require '../vendor/autoload.php';

    const PUBLIC_PATH    = 'public/';
    const FILE_BASE_PATH = 'files/';
    const UPLOAD_PATH    = '<PUBLIC_PATH>upload/';
    const DOC_PATH       = '<UPLOAD_PATH>doc/';

    ConstantsManager::initSystemConstants();

    $res = Consts::get('DOC_PATH');

    print_r($res);