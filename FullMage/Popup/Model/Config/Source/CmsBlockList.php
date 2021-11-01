<?php
declare(strict_types=1);

namespace FullMage\Popup\Model\Config\Source;

/**
 * Cms blocks dropdown
 */
class CmsBlockList implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array|null
     */
    protected $options = null;

    /**
     * Category collection factory
     *
     * @var \Magento\Cms\Model\ResourceModel\Block\CollectionFactory
     */
    protected $cmsBlockCollFactory;

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

    /**
     * Retrieve option values array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->options) {
            $this->options = $this->cmsBlockCollFactory->create()->load()->toOptionArray();
            array_unshift($this->options, ['value' => '', 'label' => __('Please select a static block.')]);
        }
        return $this->options;
    }
}
