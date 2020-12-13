<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Natalsem\Notification\Api\MessageInterface;

/**
 * Class Message
 *
 * @package Natalsem\Notification\Model
 */
class Message extends AbstractExtensibleModel implements MessageInterface
{
    /**
     * Get message text
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * Set message text
     *
     * @param string $message
     *
     * @return MessageInterface
     */
    public function setMessage(string $message): MessageInterface
    {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * Get phone number
     *
     * @return string
     */
    public function getNumber(): string
    {
        return (string) $this->getData(self::MESSAGE);
    }

    /**
     * Set phone number
     *
     * @param string $number
     *
     * @return MessageInterface
     */
    public function setNumber(string $number): MessageInterface
    {
        return $this->setData(self::NUMBER, $number);
    }
}
