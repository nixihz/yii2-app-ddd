<?php

namespace internal\domain\thread\event;

use internal\domain\thread\entity\Post;

class PassedEvent implements EventInterface
{

    public function __construct(
        public Post $post,
    ) {
    }

}