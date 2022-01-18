<?php

namespace internal\domain\demo\service;

use internal\domain\demo\entity\Demo;
use internal\domain\demo\repository\po\DemoPO;

class DemoFactory
{

    public function createDemoPO(Demo $demo): DemoPO
    {
        $demoPo = $demo->demoPO;
        if (!$demoPo) {
            $demoPo = new DemoPO();
        }
        $demoPo->created_at = $demo->createdAt;
        if ($demo->updatedAt) {
            $demoPo->updated_at = $demo->updatedAt;
        }

        return $demoPo;
    }

    public function createDemo(?DemoPO $demoPO): Demo
    {
        $demo = new Demo();
        $demo->id = $demoPO->id;
        $demo->comment = $demoPO->comment;

        return $demo;
    }

}
