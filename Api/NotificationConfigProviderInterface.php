<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

use Magento\Tests\NamingConvention\true\bool;

/**
 * Interface NotificationConfigProviderInterface
 *
 * @package Natalsem\Notification\Api
 */
interface NotificationConfigProviderInterface
{
    /** @var string Path to "is active" config */
    public const XML_PATH_CONFIG_IS_ACTIVE = 'notification/general/is_active';

    /** @var string Path to channel selector config */
    public const XML_PATH_CONFIG_IS_CHANNEL = 'notification/general/channel';

//    public const XML_PATH_CONFIG_IS_CHANNEL = 'notification/message/{event}';

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
     * @return array
     */
    public function getMessageByEvent($event): array;

    public function isEventActive(string $event): bool;
}
