<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Traits\TimestampableTrait;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setUpdatedAt'],
        ];
    }

    public function setCreatedAt(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
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

    public function setUpdatedAt(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!in_array(TimestampableTrait::class, class_uses($entity))) {
            return;
        }

        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTimeImmutable());
        }
    }
}