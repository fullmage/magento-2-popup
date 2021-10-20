<?php

declare(strict_types=1);

namespace FullMage\Popup\Block;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;

class Popup extends \Magento\Framework\View\Element\Template
{

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
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $blockFactory;

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * @var \FullMage\Popup\Model\Config
     */
    protected $popupModel;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     * @param \Magento\Framework\App\Request\Http $request
     * @param \FullMage\Popup\Model\Config $popupModel
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Framework\App\Request\Http $request,
        \FullMage\Popup\Model\Config $popupModel,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
        $this->blockFactory = $blockFactory;
        $this->request = $request;
        $this->popupModel = $popupModel;
        parent::__construct($context, $data);
    }

    /**
     * Get URL for newsletter subscribe
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('newsletter/subscriber/new', ['_secure' => true]);
    }

    /**
     * Get Image URL
     *
     * @return string
     */
    public function getImageUrl()
    {
        $imagePath = $this->getPopupModel()->getConfig(\FullMage\Popup\Model\Config::IMAGE_UPLOAD);
        $mediaPath = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        return $mediaPath.'popup/'.$imagePath;
    }

    /**
     * Get wyswing content
     *
     * @param string $content
     * @return string
     */
    public function getWyswingContent($content)
    {
        $storeId = $this->storeManager->getStore()->getId();
        return $this->filterProvider->getBlockFilter()->setStoreId($storeId)->filter($content);
    }

    /**
     * Get CMS Block
     *
     * @param int $blockId
     * @return bool|\Magento\Cms\Model\BlockFactory
     * @throws \NoSuchEntityException
     */
    public function getCmsBlock($blockId)
    {
        try {
            $storeId = $this->storeManager->getStore()->getId();
            $content = $this->blockFactory->create()->setStoreId($storeId)->load($blockId);
        } catch (NoSuchEntityException $e) {
            $content = false;
        }
        return $content;
    }

    /**
     * Get Full Action Name
     *
     * @return \Magento\Framework\App\Request\Http
     * @throws \NoSuchEntityException
     */
    public function getFullActionName()
    {
        return $this->request->getFullActionName();
    }

    /**
     * Get Full Action Name
     *
     * @return \FullMage\Popup\Model\Config
     */
    public function getPopupModel()
    {
        return $this->popupModel;
    }
}
