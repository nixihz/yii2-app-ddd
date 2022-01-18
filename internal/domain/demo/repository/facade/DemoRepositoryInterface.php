<?php

namespace internal\domain\demo\repository\facade;

use internal\domain\demo\repository\po\DemoPO;

interface DemoRepositoryInterface
{

    public function query();

    public function getDemoPO($id);

    public function getDemoPOList($ids);

    public function save(DemoPO $demoPO);

}
