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
     * Send message
     *
     * @param string $messageText
     * @param string $number
     */
    public function sendMessage(string $messageText, string $number): void;
}
