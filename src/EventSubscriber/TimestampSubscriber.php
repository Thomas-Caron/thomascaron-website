<?php

namespace App\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Traits\TimestampableTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TimestampSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if (!in_array(TimestampableTrait::class, class_uses($entity))) {
            return;
        }

        $now = new \DateTimeImmutable();
        if (method_exists($entity, 'setCreatedAt') && $entity->getCreatedAt() === null) {
            $entity->setCreatedAt($now);
        }
        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt($now);
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if (!in_array(TimestampableTrait::class, class_uses($entity))) {
            return;
        }

        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTimeImmutable());
        }
    }
}