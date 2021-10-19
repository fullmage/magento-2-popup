<?php

namespace FullMage\Popup\Model\Config\Source;

class WhereToShow implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'allpage', 'label' => __('Display on All Pages')],
            ['value' => 'homepage', 'label' => __('Display on Homepage Only')]
        ];
    }

    public function toArray()
    {
        return [
            'allpage' => __('Display on All Pages'),
            'homepage' => __('Display on Homepage Only')
        ];
    }
}
