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
    /**
     * @return bool
     */
    public function isLogActive(): bool
    {
        return (bool) $this->scopeConfig->getValue(self::XML_PATH_CONFIG_IS_LOG_ACTIVE);
    }

    public function getMethod(): string
    {
        return (string) $this->scopeConfig->getValue(self::XML_PATH_CONFIG_GROUP_MESSAGES);
    }

    public function getEventList()
    {
        $list = $this->scopeConfig->getValue(self::XML_PATH_CONFIG_EVENTS_LIST);
        $arrayList = explode(',', $list);

        return $arrayList;
    }

    /**
     * Get message by event name
     *
     * @param $eventName
     *
     * @return string
     */
    public function getMessageByEvent(string $eventName): string
    {
        $path = self::XML_PATH_CONFIG_GROUP_MESSAGES . $eventName;
        $message = (string) $this->scopeConfig->getValue($path);

        return $message;
    }

    public function isEventActive(string $eventName): bool
    {
        $eventsList = $this->getEventList();

        return in_array($eventName, $eventsList);
    }


}
