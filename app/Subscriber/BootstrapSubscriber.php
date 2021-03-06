<?php

namespace Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BootstrapSubscriber extends Base implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'session.bootstrap' => array('setup', 0),
            'api.bootstrap' => array('setup', 0),
        );
    }

    public function setup()
    {
        $this->container['config']->setupTranslations();
        $this->container['config']->setupTimezone();
    }
}
