<?php

namespace FullMage\Popup\Block;

use Magento\Framework\Exception\NoSuchEntityException;

class Popup extends \Magento\Framework\View\Element\Template
{
    const POPUP_ENABLED = 'popup/general/enable';

    const POPUP_SETCONTENT_TYPE = 'popup/general/setcontent';

    const POPUP_CMS_BLOCK = 'popup/general/blockidentifer';

    const POPUP_MESSAGE = 'popup/general/message';
    
    const POPUP_HEADING = 'popup/general/heading';

    const FOOTER_ENABLED = 'popup/general/show_footer';


    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $filterProvider;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Cms\Api\BlockRepositoryInterface
     */
    protected $blockRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Api\BlockRepositoryInterface $blockRepository,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
        $this->blockRepository = $blockRepository;
        parent::__construct($context, $data);
    }

    public function getConfig($path, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function isEnabled()
    {
        return $this->getConfig(self::POPUP_ENABLED);
    }

    public function getPopupHeading()
    {
        return $this->getConfig(self::POPUP_HEADING);
    }

    public function getPopupMessage()
    {
        return $this->getConfig(self::POPUP_MESSAGE);
    }

    public function getPopupContentType()
    {
        return $this->getConfig(self::POPUP_SETCONTENT_TYPE);
    }

    public function getPopupCmsBlock()
    {
        return $this->getConfig(self::POPUP_CMS_BLOCK);
    }

    public function getWyswingContent($content)
    {
        $storeId = $this->storeManager->getStore()->getId();
        return $this->filterProvider->getBlockFilter()->setStoreId($storeId)->filter($content);
    }

    public function isFooterEnabled()
    {
        return $this->getConfig(self::FOOTER_ENABLED);
    }

    public function getCmsBlock($blockId)
    {
        $cmsBlock = $this->blockRepository->getById($blockId);
        
        if (!$cmsBlock->getId()) {
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', $blockId));
        }

        return $cmsBlock;
    }
}
