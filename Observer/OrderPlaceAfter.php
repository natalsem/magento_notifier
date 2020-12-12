<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Natalsem\Notification\Api\NotificationConfigProviderInterface;
use Natalsem\Notification\Api\NotifierInterface;

/**
 * Class OrderPlaceAfter
 *
 * @package Natalsem\Notification\Observer
 */
class OrderPlaceAfter implements ObserverInterface
{
    /**
     * @var NotificationConfigProviderInterface
     */
    private $notificationConfig;

    /**
     * @var NotifierInterface
     */
    private $notifier;

    /**
     * OrderPlaceAfter constructor.
     *
     * @param NotificationConfigProviderInterface $notificationConfig
     * @param NotifierInterface $notifier
     */
    public function __construct(
        NotificationConfigProviderInterface $notificationConfig,
        NotifierInterface $notifier
    ) {
        $this->notificationConfig = $notificationConfig;
        $this->notifier = $notifier;
    }

    /**
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $isActive = $this->notificationConfig->isActive();
        $event = '';
        $isEventActive = $this->notificationConfig->isEventActive($event);
        if ($isActive && $isEventActive) {
            $message = $this->notificationConfig->getMessageByEvent($event);
            $telephone = '';
            $this->notifier->sendMessage($message, $telephone);
        }
    }

}
