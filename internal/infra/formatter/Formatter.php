<?php

namespace internal\infra\formatter;

use s9e\TextFormatter\Configurator;

class Formatter extends BaseFormatter
{
    /**
     * @return Configurator
     */
    protected function getConfigurator()
    {
        $configurator = parent::getConfigurator();

        //parent::confEmoji($configurator);

        parent::confHtml($configurator);

        //parent::confUserMention($configurator);

        //parent::confTopic($configurator);

        $configurator->plugins->load('Litedown');
        $configurator->plugins->load('TaskLists');
        $configurator->plugins->load('PipeTables');

        return $configurator;
    }
}
