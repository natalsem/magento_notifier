<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Api;

/**
 * Class MessageInterface
 *
 * @package Natalsem\Notification\Api
 */
interface MessageInterface
{
    /** @var string Data field message */
    public const MESSAGE = 'message';

    /** @var string Data field number */
    public const NUMBER = 'mobileNumber';

    /**
     * Get message text
     *
     * @return string
     */
    public function getMessage(): string;

    /**
     * Set message text
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): self;

    /**
     * Get phone number
     *
     * @return string
     */
    public function getNumber(): string;

    /**
     * Set phone number
     *
     * @param string $number
     *
     * @return $this
     */
    public function setNumber(string $number): self;
}
