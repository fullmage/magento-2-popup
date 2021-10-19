<?php

namespace FullMage\Popup\Block;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;

class Popup extends \Magento\Framework\View\Element\Template
{
    const POPUP_ENABLED = 'popup/general/enable';

    const POPUP_WIDTH = 'popup/general/popup_width';

    const POPUP_HEIGHT = 'popup/general/popup_height';

    const POPUP_SETCONTENT_TYPE = 'popup/general/setcontent';

    const POPUP_CMS_BLOCK = 'popup/general/blockidentifer';

    const POPUP_MESSAGE = 'popup/general/message';
    
    const POPUP_HEADING = 'popup/general/heading';

    const FOOTER_ENABLED = 'popup/general/show_footer';

    const BUTTON_BG_COLOR = 'popup/general/button_color_field';

    const BUTTON_FONT_COLOR = 'popup/general/button_font_color_field';

    const BUTTON_TEXT = 'popup/general/button_text';

    const IMAGE_UPLOAD = 'popup/general/image_upload';

    const SHOW_NEWSLETTER = 'popup/general/show_newsletter';

    const NEWSLETTER_FONT_COLOR = 'popup/general/newsletter_font_color';

    const NEWSLETTER_BUTTON_FONT = 'popup/general/newsletter_button_font_color';

    const NEWSLETTER_PLACEHOLDER = 'popup/general/newsletter_textbox_placeholder';

    const NEWSLETTER_LABEL_TEXT = 'popup/general/newsletter_label_text';

    const NEWSLETTER_BUTTON_TEXT = 'popup/general/newsletter_button_text';

    const POPUP_SHOW_TIME = 'popup/general/delay';

    const POPUP_WHERE_TO_SHOW = 'popup/general/wheretoshow';

    const POPUP_COOKIE_EXP = 'popup/general/cookieexp';

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

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Framework\App\Request\Http $request,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
        $this->blockFactory = $blockFactory;
        $this->request = $request;
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

    public function getPopupWidth()
    {
        return $this->getConfig(self::POPUP_WIDTH);
    }

    public function getPopupHeight()
    {
        return $this->getConfig(self::POPUP_HEIGHT);
    }

    public function getPopupHeading()
    {
        return $this->getConfig(self::POPUP_HEADING);
    }

    public function getPopupMessage()
    {
        return $this->getConfig(self::POPUP_MESSAGE);
    }

    public function getPopupCmsBlock()
    {
        return $this->getConfig(self::POPUP_CMS_BLOCK);
    }

    public function getPopupContentType()
    {
        return $this->getConfig(self::POPUP_SETCONTENT_TYPE);
    }

    public function getButtonText()
    {
        return $this->getConfig(self::BUTTON_TEXT);
    }

    public function getButtonFontColor()
    {
        return $this->getConfig(self::BUTTON_FONT_COLOR);
    }

    public function getButtonBgColor()
    {
        return $this->getConfig(self::BUTTON_BG_COLOR);
    }

    public function getShowNewsletter()
    {
        return $this->getConfig(self::SHOW_NEWSLETTER);
    }

    public function getNewsletterFontColor()
    {
        return $this->getConfig(self::NEWSLETTER_FONT_COLOR);
    }

    public function getNewsletterButtonColor()
    {
        return $this->getConfig(self::NEWSLETTER_BUTTON_FONT);
    }

    public function getNewsletterPlaceholder()
    {
        return $this->getConfig(self::NEWSLETTER_PLACEHOLDER);
    }

    public function getNewsletterLabelText()
    {
        return $this->getConfig(self::NEWSLETTER_LABEL_TEXT);
    }

    public function getNewsletterButtonText()
    {
        return $this->getConfig(self::NEWSLETTER_BUTTON_TEXT);
    }

    public function isFooterEnabled()
    {
        return $this->getConfig(self::FOOTER_ENABLED);
    }

    public function getPopupShowTime()
    {
        return $this->getConfig(self::POPUP_SHOW_TIME);
    }

    public function getPopupWhereToShow()
    {
        return $this->getConfig(self::POPUP_WHERE_TO_SHOW);
    }

    public function getPopupCookieExpire()
    {
        return $this->getConfig(self::POPUP_COOKIE_EXP);
    }

    public function getFormActionUrl()
    {
        return $this->getUrl('newsletter/subscriber/new', ['_secure' => true]);
    }

    public function getImageUrl()
    {
        $imagePath = $this->getConfig(self::IMAGE_UPLOAD);
        $mediaPath = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        return $mediaPath.'popup/'.$imagePath;
    }

    public function getWyswingContent($content)
    {
        $storeId = $this->storeManager->getStore()->getId();
        return $this->filterProvider->getBlockFilter()->setStoreId($storeId)->filter($content);
    }

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

    public function getFullActionName()
    {
        return $this->request->getFullActionName();
    }
}
