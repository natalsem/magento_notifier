<?php
/**
 * @author Natalia Sekulich <sekulich.n@gmail.com>
 */
declare(strict_types=1);

namespace Natalsem\Notification\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

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
        foreach ($options as $option) {
            $optionsArray[] = [
                'value' => $option,
                'label' => __($option),
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
            'order_place' => 'Placing Order',
            'shipment_created' => 'Order has been shipped',
            'forgot_password' => 'Password change request',
        ];
    }
}
