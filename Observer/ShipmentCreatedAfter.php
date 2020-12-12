<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\ShipmentInterface;
use Magento\Tests\NamingConvention\true\string;
use Natalsem\Notification\Api\NotificationConfigProviderInterface;
use Natalsem\Notification\Api\NotifierInterface;
use Natalsem\Notification\Model\MessageDataFetcher;

/**
 * Class ShipmentCreatedAfter
 *
 * @package Natalsem\Notification\Observer
 */
class ShipmentCreatedAfter implements ObserverInterface
{
    /** @var string Event name for shipment creation */
    public const EVENT_NAME = 'checkout_submit_all_after'; //todo replace with correct name

    /** @var string Label for event name */
    public const EVENT_NAME_LABEL = 'Order shipment created';

    /**
     * @var MessageDataFetcher
     */
    private $dataFetcher;

    /**
     * @var NotifierInterface
     */
    private $notifier;

    /**
     * @var NotificationConfigProviderInterface
     */
    private $notificationConfig;

    /**
     * ShipmentCreatedAfter constructor.
     *
     * @param MessageDataFetcher $dataFetcher
     * @param NotificationConfigProviderInterface $notificationConfig
     * @param NotifierInterface $notifier
     */
    public function __construct(
        MessageDataFetcher $dataFetcher,
        NotificationConfigProviderInterface $notificationConfig,
        NotifierInterface $notifier
    ) {
        $this->dataFetcher = $dataFetcher;
        $this->notifier = $notifier;
        $this->notificationConfig = $notificationConfig;
    }

    /**
     * Execute method for shipment creation
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /** @var ShipmentInterface $shipment */
        $shipment = $observer->getEvent()->getShipment();
        $addressId = $shipment->getShippingAddressId();
        if ($addressId) {
            $message = $this->getMessage($shipment);
            $telephone = $this->dataFetcher->getPhoneNumberByAddressId($addressId);
            if ($telephone && $message) {
                $this->notifier->sendMessage($message, $telephone);
            }
        }
    }

    /**
     * Get message for shipment event
     *
     * @param ShipmentInterface $shipment
     *
     * @return string
     */
    private function getMessage(ShipmentInterface $shipment): string
    {
        /** @var OrderInterface $order */
        $order = $shipment->getOrder();
        $message = $this->notificationConfig->getMessageByEvent(self::EVENT_NAME);
        $message = str_replace('{ORDER_ID}', $order->getIncrementId(), $message);
        $tracks = $shipment->getTracks();
        foreach ($tracks as $track) {
            $numbers[] = $track->getTrackNumber();
        }
        if (!empty($numbers)) {
            $trackNumbers = implode(', ', $numbers);
            $message = str_replace('{TRACK}', $trackNumbers, $message);
        }

        return $message;
    }
}
