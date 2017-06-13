<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-01 18:43
 */
namespace Notadd\Content\Entities;

use Notadd\Foundation\Flow\Abstracts\Entity;
use Symfony\Component\Workflow\Event\GuardEvent;
use Symfony\Component\Workflow\Transition;

/**
 * Class Page.
 */
class Page extends Entity
{
    /**
     * @return string
     */
    public function name()
    {
        return 'content.page';
    }

    /**
     * @return array
     */
    public function places()
    {
        return [
            'create',
            'created',
            'edit',
            'edited',
            'publish',
            'published',
            'remove',
            'removed',
            'review',
            'reviewed',
        ];
    }

    /**
     * @return array
     */
    public function transitions()
    {
        return [
            new Transition('create', 'create', 'created'),
            new Transition('need_to_edit', ['created', 'edited'], 'edit'),
            new Transition('edit', 'edit', 'edited'),
            new Transition('need_to_publish', ['created', 'edited'], 'publish'),
            new Transition('publish', 'publish', 'publish'),
            new Transition('need_to_remove', ['created', 'edited'], 'remove'),
            new Transition('remove', 'remove', 'removed'),
            new Transition('wait_to_review', ['created', 'edited'], 'review'),
            new Transition('review', 'review', 'reviewed'),
        ];
    }

    /**
     * Announce a transition.
     */
    public function announce()
    {
        // TODO: Implement announce() method.
    }

    /**
     * Enter a place.
     */
    public function enter()
    {
        // TODO: Implement enter() method.
    }

    /**
     * Entered a place.
     */
    public function entered()
    {
        // TODO: Implement entered() method.
    }

    /**
     * Guard a transition.
     *
     * @param \Symfony\Component\Workflow\Event\GuardEvent $event
     */
    public function guard(GuardEvent $event)
    {
        switch ($event->getTransition()->getName()) {
            case 'create':
                $this->block($event, $this->permission(''));
                break;
            case 'need_to_edit':
                $this->block($event, $this->permission(''));
                break;
            case 'edit':
                $this->block($event, $this->permission(''));
                break;
            case 'need_to_publish':
                $this->block($event, $this->permission(''));
                break;
            case 'publish':
                $this->block($event, $this->permission(''));
                break;
            case 'need_to_remove':
                $this->block($event, $this->permission(''));
                break;
            case 'remove':
                $this->block($event, $this->permission(''));
                break;
            case 'wait_to_review':
                $this->block($event, $this->permission(''));
                break;
            case 'review':
                $this->block($event, $this->permission(''));
                break;
            default:
                $event->setBlocked(true);
        }
    }

    /**
     * Leave a place.
     */
    public function leave()
    {
        // TODO: Implement leave() method.
    }

    /**
     * Into a transition.
     */
    public function transition()
    {
        // TODO: Implement transition() method.
    }
}