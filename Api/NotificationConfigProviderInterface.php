<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

use Magento\Tests\NamingConvention\true\bool;
use Magento\Tests\NamingConvention\true\string;

/**
 * Interface NotificationConfigProviderInterface
 *
 * @package Natalsem\Notification\Api
 */
interface NotificationConfigProviderInterface
{
    /** @var string Path to "is active" config */
    public const XML_PATH_CONFIG_IS_ACTIVE = 'notification/general/is_active';

    /** @var string Path to messenger selector config */
    public const XML_PATH_CONFIG_IS_CHANNEL = 'notification/general/messenger';

    /** @var string Path to events list config settings */
    public const XML_PATH_CONFIG_EVENTS_LIST = 'notification/general/events';

    /** @var string XML path to messege config group */
    public const XML_PATH_CONFIG_GROUP_MESSAGES = 'notification/messages/';

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @return string
     */
    public function getChannel(): string;

    /**
     * @return array
     */
    public function getEventList(): array;

    /**
     * Get message by event name
     *
     * @param $eventName
     *
     * @return string
     */
    public function getMessageByEvent(string $eventName): string;

    public function isEventActive(string $eventName): bool;
}
