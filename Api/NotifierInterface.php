<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

use Magento\Tests\NamingConvention\true\string;

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
     * @param string $message
     * @param string $number
     */
    public function sendMessage(string $message, string $number): void;
}
