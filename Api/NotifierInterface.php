<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

/**
 * Interface NotifierInterface
 *
 * @package Natalsem\Notification\Api
 */
interface NotifierInterface
{
    /**
     * @param $message
     */
    public function sendMessage($message, $number): void;
}
