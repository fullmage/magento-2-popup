<?php

namespace FullMage\Popup\Model\Config\Source;

class CmsBlockList implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Category collection factory
     *
     * @var \Magento\Cms\Model\ResourceModel\Block\CollectionFactory
     */
    protected $cmsBlockCollFactory;

    protected $options = null;

    /**
     * Construct
     *
     * @param \Magento\Cms\Model\ResourceModel\Block\CollectionFactory $cmsBlockCollFactory
     */
    public function __construct(
        \Magento\Cms\Model\ResourceModel\Block\CollectionFactory $cmsBlockCollFactory
    ) {
        $this->cmsBlockCollFactory = $cmsBlockCollFactory;
    }

    public function toOptionArray()
    {
        if (!$this->options) {
            $this->options = $this->cmsBlockCollFactory->create()->load()->toOptionArray();
            array_unshift($this->options, ['value' => '', 'label' => __('Please select a static block.')]);
        }
        return $this->options;
    }
}
