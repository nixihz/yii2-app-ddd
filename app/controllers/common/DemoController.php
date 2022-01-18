<?php

namespace app\controllers\common;

use internal\application\service\CommonApplicationService;
use internal\base\BaseController;

class DemoController extends BaseController
{

    public function __construct(
        $id,
        $module,
        $config = [],
        public CommonApplicationService $commonApplicationService,
    )
    {
        parent::__construct($id, $module, $config);
    }

}