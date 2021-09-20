<?php

namespace FullMage\Popup\Model\Config\Source;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('-- Select an Option --')],
            ['value' => 'custom', 'label' => __('Custom')],
            ['value' => 'cms_block', 'label' => __('From CMS Block')],
            ['value' => 'image_upload', 'label' => __('Image Upload')]
        ];
    }

    public function toArray()
    {
        return [
            '' => __('-- Select an Option --'),
            'custom' => __('Custom'),
            'cms_block' => __('From CMS Block'),
            'image_upload' => __('Image Upload')
        ];
    }
}
