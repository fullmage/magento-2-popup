<?php

declare(strict_types=1);

namespace FullMage\Popup\Model\Config\Source;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve option values array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('-- Select an Option --')],
            ['value' => 'custom', 'label' => __('Custom')],
            ['value' => 'cms_block', 'label' => __('From CMS Block')],
            ['value' => 'newsletter_sign_up', 'label' => __('Simple Newsletter Sign Up')]
        ];
    }
}
