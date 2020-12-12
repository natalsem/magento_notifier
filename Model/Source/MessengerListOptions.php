<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class MessengerListOptions
 *
 * @package Natalsem\Notification\Model\Source
 */
class MessengerListOptions implements OptionSourceInterface
{
    /** @var array Messenger list */
    public const MESSENGER_LIST = ['viber'];

    /**
     * Get list of available messengers
     * @return array
     */
    public function toOptionArray(): array
    {
        $optionsArray = [];
        foreach (self::MESSENGER_LIST as $option) {
            $optionsArray[] = [
                'value' => $option,
                'label' => ucfirst($option),
                '__disableTmpl' => false
            ];
        }

        return $optionsArray;
    }
}
