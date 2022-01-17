<?php

namespace internal\components;

use Exception;
use Psr\EventDispatcher\EventDispatcherInterface;
use Yii;
use yii\base\Component;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\EventDispatcher\Provider\Provider;

class EventListener extends Component
{

    public function __construct(
        $config = [],
    ) {
        parent::__construct($config);
    }


    /**
     * Init component
     */
    public function init()
    {
        parent::init();

        $eventListeners = Yii::$app->params['events'];
        $listenerCollection = new ListenerCollection();

        foreach ($eventListeners as $eventName => $listeners) {
            if (!is_string($eventName)) {
                throw new Exception(
                    'Incorrect event listener format. Format with event name must be used.'
                );
            }

            if (!is_iterable($listeners)) {
                $type = is_object($listeners) ? get_class($listeners) : gettype($listeners);

                throw new Exception(
                    "Event listeners for $eventName must be an iterable, $type given."
                );
            }

            /** @var mixed */
            foreach ($listeners as $callable) {
                $listener =
                    /** @return mixed */
                    function (object $event) use ($callable) {
                        return call_user_func($callable, $event);
                    };
                $listenerCollection = $listenerCollection->add($listener, $eventName);
            }
        }

        $provider = new Provider($listenerCollection);

        Yii::$container->get(EventDispatcherInterface::class)->attach(new Dispatcher($provider));
    }

}