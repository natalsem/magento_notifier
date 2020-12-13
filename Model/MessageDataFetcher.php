<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Exception;
use Magento\Sales\Api\OrderAddressRepositoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Class MessageDataFetcher
 *
 * @package Natalsem\Notification\Model
 */
class MessageDataFetcher
{
    /**
     * @var OrderAddressRepositoryInterface
     */
    private $addressRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * MessageDataFetcher constructor.
     *
     * @param OrderAddressRepositoryInterface $addressRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        OrderAddressRepositoryInterface $addressRepository,
        LoggerInterface $logger
    ) {
        $this->addressRepository = $addressRepository;
        $this->logger = $logger;
    }

    /**
     * Get phone number from address by address Id
     *
     * @param int $addressId
     *
     * @return string
     */
    public function getPhoneNumberByAddressId(int $addressId): string
    {
        $phoneNumber = '';
        try {
            $address = $this->addressRepository->get($addressId);
            $phoneNumber = (string) $address->getTelephone();
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return $phoneNumber;
    }
}
