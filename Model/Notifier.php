<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Magento\Tests\NamingConvention\true\string;
use Natalsem\Notification\Api\NotifierInterface;

/**
 * Class Notifier
 *
 * @package Natalsem\Notification\Model
 */
class Notifier implements NotifierInterface
{
    public function __construct()
    {
    }

    /**
     * Send message
     *
     * @param string $message
     * @param string $number
     */
    public function sendMessage(string $message, string $number): void
    {
        // TODO: Implement sendMessage() method.
    }
}
