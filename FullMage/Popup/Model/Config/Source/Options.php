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
            ['value' => 'newsletter_sign_up', 'label' => __('Simple Newsletter Sign Up')]
        ];
    }

    public function toArray()
    {
        return [
            '' => __('-- Select an Option --'),
            'custom' => __('Custom'),
            'cms_block' => __('From CMS Block'),
            'newsletter_sign_up' => __('Simple Newsletter Sign Up')
        ];
    }
}
