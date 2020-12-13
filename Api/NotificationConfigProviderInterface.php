<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

/**
 * Interface NotificationConfigProviderInterface
 *
 * @package Natalsem\Notification\Api
 */
interface NotificationConfigProviderInterface
{
    /** @var string Path to "is active" config */
    public const XML_PATH_CONFIG_IS_ACTIVE = 'notification/general/is_active';

    /** @var string Path to "is active" config */
    public const XML_PATH_CONFIG_IS_LOG_ACTIVE = 'notification/general/log';

    /** @var string Path to messenger selector config */
    public const XML_PATH_CONFIG_METHOD = 'notification/general/method';

    /** @var string Path to events list config settings */
    public const XML_PATH_CONFIG_EVENTS_LIST = 'notification/general/events';

    /** @var string XML path to message config group */
    public const XML_PATH_CONFIG_GROUP_MESSAGES = 'notification/messages/';

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @return bool
     */
    public function isLogActive(): bool;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array
     */
    public function getEventList();

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
