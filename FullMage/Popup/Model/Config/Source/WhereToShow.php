<?php

declare(strict_types=1);

namespace FullMage\Popup\Model\Config\Source;

class WhereToShow implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve option values array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'allpage', 'label' => __('Display on All Pages')],
            ['value' => 'homepage', 'label' => __('Display on Homepage Only')]
        ];
    }
}
