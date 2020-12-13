<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Natalsem\Notification\Observer\OrderPlaceAfter;

/**
 * Class EventListOptions
 *
 * @package Natalsem\Notification\Model\Source
 */
class EventListOptions implements OptionSourceInterface
{
    /**
     * Events list for options
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $optionsArray = [];
        $options = $this->getOptionsArray();
        foreach ($options as $value => $label) {
            $optionsArray[] = [
                'value' => $value,
                'label' => __($label),
                '__disableTmpl' => false
            ];
        }

        return $optionsArray;
    }

    /**
     * Get events list as array
     *
     * @return array
     */
    private function getOptionsArray(): array
    {
        return [
            OrderPlaceAfter::EVENT_NAME => OrderPlaceAfter::EVENT_NAME_LABEL,
            'shipment_created' => 'Order shipment created',
            'forgot_password' => 'Password change request',
        ];
    }
}
