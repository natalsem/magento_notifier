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
use Natalsem\Notification\Model\MessageDataFetcher;

/**
 * Class OrderPlaceAfter
 *
 * @package Natalsem\Notification\Observer
 */
class OrderPlaceAfter implements ObserverInterface
{
    /** @var string Event name for order place */
    public const EVENT_NAME = 'checkout_submit_all_after';

    /** @var string Label for event name */
    public const EVENT_NAME_LABEL = 'Place Order';

    /**
     * @var NotificationConfigProviderInterface
     */
    private $notificationConfig;

    /**
     * @var NotifierInterface
     */
    private $notifier;

    /**
     * @var MessageDataFetcher
     */
    private $dataFetcher;

    /**
     * OrderPlaceAfter constructor.
     *
     * @param NotificationConfigProviderInterface $notificationConfig
     * @param MessageDataFetcher $dataFetcher
     * @param NotifierInterface $notifier
     */
    public function __construct(
        NotificationConfigProviderInterface $notificationConfig,
        MessageDataFetcher $dataFetcher,
        NotifierInterface $notifier
    ) {
        $this->notificationConfig = $notificationConfig;
        $this->notifier = $notifier;
        $this->dataFetcher = $dataFetcher;
    }

    /**
     * Get message for order placing event
     *
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $isActive = $this->notificationConfig->isActive();
        $isEventActive = $this->notificationConfig->isEventActive(self::EVENT_NAME);
        if ($isActive && $isEventActive) {
            $telephone = $this->dataFetcher->getPhoneNumberByAddressId(1); //todo get from order
            if ($telephone) {
                $orderId = ''; //todo get from event, from order
                $message = $this->notificationConfig->getMessageByEvent(self::EVENT_NAME);
                $message = str_replace('{ORDER_ID}', $orderId, $message);
                $this->notifier->sendMessage($message, $telephone);
            }
        }
    }
}
