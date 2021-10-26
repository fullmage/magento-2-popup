<?php
declare(strict_types=1);

namespace FullMage\Popup\Block;

use FullMage\Popup\Model\Config;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;

class Popup extends \Magento\Framework\View\Element\Template
{

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var FilterProvider
     */
    protected $filterProvider;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var BlockFactory
     */
    protected $blockFactory;

    /**
     * @var Http
     */
    protected $request;

    /**
     * @var Config
     */
    protected $popupModel;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param FilterProvider $filterProvider
     * @param StoreManagerInterface $storeManager
     * @param BlockFactory $blockFactory
     * @param Http $request
     * @param Config $config
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ScopeConfigInterface                             $scopeConfig,
        FilterProvider                                   $filterProvider,
        StoreManagerInterface                            $storeManager,
        BlockFactory                                     $blockFactory,
        Http                                             $request,
        Config                                           $config,
        array                                            $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
        $this->blockFactory = $blockFactory;
        $this->request = $request;
        $this->popupModel = $config;
        parent::__construct($context, $data);
    }

    /**
     * Get URL for newsletter subscribe
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('newsletter/subscriber/new');
    }

    /**
     * Get Image URL
     *
     * @return string
     */
    public function getImageUrl()
    {
        $imagePath = $this->getPopupModel()->getConfig(Config::IMAGE_UPLOAD);
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
     * @return bool|BlockFactory
     * @throws NoSuchEntityException
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
     * @return string
     */
    public function getFullActionName()
    {
        return $this->request->getFullActionName();
    }

    /**
     * Get Full Action Name
     *
     * @return Config
     */
    public function getPopupModel()
    {
        return $this->popupModel;
    }
}
