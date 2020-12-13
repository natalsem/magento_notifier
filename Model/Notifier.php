<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Natalsem\Notification\Api\NotificationConfigProviderInterface;
use Natalsem\Notification\Api\NotifierInterface;
use Psr\Log\LoggerInterface;
use Natalsem\Notification\Model\MessageFactory;
use Natalsem\Notification\Api\MessageInterface;

/**
 * Class Notifier
 *
 * @package Natalsem\Notification\Model
 */
class Notifier implements NotifierInterface
{
    /**
     * @var NotificationConfigProviderInterface
     */
    private $configProvider;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var \Natalsem\Notification\Model\MessageFactory
     */
    private $messageFactory;

    /**
     * Notifier constructor.
     *
     * @param NotificationConfigProviderInterface $configProvider
     * @param \Natalsem\Notification\Model\MessageFactory $messageFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        NotificationConfigProviderInterface $configProvider,
        MessageFactory $messageFactory,
        LoggerInterface $logger
    ) {
        $this->configProvider = $configProvider;
        $this->logger = $logger;
        $this->messageFactory = $messageFactory;
    }

    /**
     * Send message
     *
     * @param string $messageText
     * @param string $number
     */
    public function sendMessage(string $messageText, string $number): void
    {
        $method = $this->configProvider->getMethod();
        $isLoggerEnabled = $this->configProvider->isLogActive();
        if ($isLoggerEnabled) {
            $this->logger->debug(print_r($messageText, true));
        }
        switch ($method) {
            case 'viber':
                //todo send by Viber
                break;
        }
        if ($isLoggerEnabled) {
            $this->logger->debug(print_r($messageText, true));
            $this->logger->debug(print_r($message, true));
        }
        // TODO: Implement sendMessage() method.
    }

    private function buildMessage(string $messageText, string $number)
    {
        /** @var MessageInterface $message */
        $message = $this->messageFactory->create();
        $message->setNumber($number);
        $message->setMessage($messageText);
    }
}
