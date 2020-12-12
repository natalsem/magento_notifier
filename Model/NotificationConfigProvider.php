<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Natalsem\Notification\Api\NotificationConfigProviderInterface;

/**
 * Class NotificationConfigProvider
 *
 * @package Natalsem\Notification\Model
 */
class NotificationConfigProvider implements NotificationConfigProviderInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * NotificationConfigProvider constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isActive(): bool
    {
        return (bool) $this->scopeConfig->getValue(self::XML_PATH_CONFIG_IS_ACTIVE);
    }

    public function getChannel(): string
    {
        return 'viber';
    }

    public function getEventList(): array
    {
        return [];
    }

    public function getMessageByEvent($event): array
    {
        // TODO: Implement getMessageByEvent() method.
    }

    public function isEventActive(string $event): bool
    {
        $eventsList = $this->getEventList();

        return in_array($event, $eventsList);
    }


}
