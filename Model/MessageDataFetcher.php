<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model;

use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Tests\NamingConvention\true\string;
use Psr\Log\LoggerInterface;

/**
 * Class MessageDataFetcher
 *
 * @package Natalsem\Notification\Model
 */
class MessageDataFetcher
{
    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * MessageDataFetcher constructor.
     *
     * @param AddressRepositoryInterface $addressRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        AddressRepositoryInterface $addressRepository,
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
            $address = $this->addressRepository->getById($addressId);
            $phoneNumber = (string) $address->getTelephone();
        } catch (LocalizedException $e) {
            $this->logger->error($e->getMessage());
        }

        return $phoneNumber;
    }
}
