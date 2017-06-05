<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-01 16:05
 */
namespace Notadd\Mall\Entities;

use Notadd\Foundation\Flow\Abstracts\Entity;
use Symfony\Component\Workflow\Transition;

/**
 * Class Express.
 */
class Express extends Entity
{
    /**
     * @return string
     */
    public function name()
    {
        return 'mall.express';
    }

    /**
     * @return array
     */
    public function places()
    {
        return [
            'pay',     // 支付
            'payed',   // 支付完成
            'send',    // 发货
            'sent',    // 发货完成
            'take',    // 收货
            'took',    // 收货完成
        ];
    }

    /**
     * @return array
     */
    public function transitions()
    {
        return [
            new Transition('pay', 'pay', 'payed'),
            new Transition('send', 'send', 'sent'),
            new Transition('take', 'take', 'took'),
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
     */
    public function guard()
    {
        // TODO: Implement guard() method.
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