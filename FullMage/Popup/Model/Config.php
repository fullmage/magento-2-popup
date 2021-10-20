<?php

declare(strict_types=1);

namespace FullMage\Popup\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config implements ConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheridoc
     */
    public function getConfig($path, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @inheridoc
     */
    public function isEnabled()
    {
        return $this->getConfig(self::POPUP_ENABLED);
    }

    /**
     * @inheridoc
     */
    public function getPopupWidth()
    {
        return $this->getConfig(self::POPUP_WIDTH);
    }

    /**
     * @inheridoc
     */
    public function getPopupHeight()
    {
        return $this->getConfig(self::POPUP_HEIGHT);
    }

    /**
     * @inheridoc
     */
    public function getPopupHeading()
    {
        return $this->getConfig(self::POPUP_HEADING);
    }

    /**
     * @inheridoc
     */
    public function getPopupMessage()
    {
        return $this->getConfig(self::POPUP_MESSAGE);
    }

    /**
     * @inheridoc
     */
    public function getPopupCmsBlock()
    {
        return $this->getConfig(self::POPUP_CMS_BLOCK);
    }

    /**
     * @inheridoc
     */
    public function getPopupContentType()
    {
        return $this->getConfig(self::POPUP_SETCONTENT_TYPE);
    }

    /**
     * @inheridoc
     */
    public function getButtonText()
    {
        return $this->getConfig(self::BUTTON_TEXT);
    }

    /**
     * @inheridoc
     */
    public function getButtonFontColor()
    {
        return $this->getConfig(self::BUTTON_FONT_COLOR);
    }

    /**
     * @inheridoc
     */
    public function getButtonBgColor()
    {
        return $this->getConfig(self::BUTTON_BG_COLOR);
    }

    /**
     * @inheridoc
     */
    public function getShowNewsletter()
    {
        return $this->getConfig(self::SHOW_NEWSLETTER);
    }

    /**
     * @inheridoc
     */
    public function getNewsletterFontColor()
    {
        return $this->getConfig(self::NEWSLETTER_FONT_COLOR);
    }

    /**
     * @inheridoc
     */
    public function getNewsletterButtonColor()
    {
        return $this->getConfig(self::NEWSLETTER_BUTTON_FONT);
    }

    /**
     * @inheridoc
     */
    public function getNewsletterPlaceholder()
    {
        return $this->getConfig(self::NEWSLETTER_PLACEHOLDER);
    }

    /**
     * @inheridoc
     */
    public function getNewsletterLabelText()
    {
        return $this->getConfig(self::NEWSLETTER_LABEL_TEXT);
    }

    /**
     * @inheridoc
     */
    public function getNewsletterButtonText()
    {
        return $this->getConfig(self::NEWSLETTER_BUTTON_TEXT);
    }

    /**
     * @inheridoc
     */
    public function isFooterEnabled()
    {
        return $this->getConfig(self::FOOTER_ENABLED);
    }

    /**
     * @inheridoc
     */
    public function getPopupShowTime()
    {
        return $this->getConfig(self::POPUP_SHOW_TIME);
    }

    /**
     * @inheridoc
     */
    public function getPopupWhereToShow()
    {
        return $this->getConfig(self::POPUP_WHERE_TO_SHOW);
    }

    /**
     * @inheridoc
     */
    public function getPopupCookieExpire()
    {
        return $this->getConfig(self::POPUP_COOKIE_EXP);
    }
}
