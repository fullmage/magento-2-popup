<?php
declare(strict_types=1);

namespace FullMage\Popup\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class Config implements ConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * Construct  method
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * @inheritdoc
     */
    public function getConfig($path, $storeId = null)
    {
        if ($storeId === null) {
            $storeId = (int) $this->storeManager->getStore()->getId();
        }
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @inheritdoc
     */
    private function getFlagFieldValue(string $xmlPath, int $storeId = null): bool
    {
        if ($storeId === null) {
            $storeId = (int) $this->storeManager->getStore()->getId();
        }
        return $this->scopeConfig->isSetFlag(
            $xmlPath,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
    /**
     * @inheritdoc
     */
    public function isEnabled(int $storeId = null): bool
    {
        return  $this->getFlagFieldValue(self::POPUP_ENABLED, $storeId);
    }

    /**
     * @inheritdoc
     */
    public function getPopupWidth()
    {
        $value =  $this->getConfig(self::POPUP_WIDTH);
        return !empty($value)? $value.'px': '800px';
    }

    /**
     * @inheritdoc
     */
    public function getPopupHeight()
    {
        $value =  $this->getConfig(self::POPUP_HEIGHT);
        return !empty($value)? $value.'px': '500px';
    }

    /**
     * @inheritdoc
     */
    public function getPopupHeading()
    {
        return $this->getConfig(self::POPUP_HEADING);
    }

    /**
     * @inheritdoc
     */
    public function getPopupMessage()
    {
        return $this->getConfig(self::POPUP_MESSAGE);
    }

    /**
     * @inheritdoc
     */
    public function getPopupCmsBlock()
    {
        return $this->getConfig(self::POPUP_CMS_BLOCK);
    }

    /**
     * @inheritdoc
     */
    public function getPopupContentType()
    {
        return $this->getConfig(self::POPUP_SETCONTENT_TYPE);
    }

    /**
     * @inheritdoc
     */
    public function getButtonText()
    {
        return $this->getConfig(self::BUTTON_TEXT);
    }

    /**
     * @inheritdoc
     */
    public function getButtonFontColor()
    {
        $configValue = $this->getConfig(self::BUTTON_FONT_COLOR);
        return !empty($configValue)? '#'.$configValue: self::DEFAULT_BUTTON_FONT_COLOR;
    }

    /**
     * @inheritdoc
     */
    public function getButtonBgColor()
    {
        $configValue = $this->getConfig(self::BUTTON_BG_COLOR);
        return !empty($configValue)? '#'.$configValue: self::DEFAULT_BG_COLOR;
    }

    /**
     * @inheritdoc
     */
    public function getShowNewsletter():bool
    {
        return $this->getFlagFieldValue(self::SHOW_NEWSLETTER);
    }

    /**
     * @inheritdoc
     */
    public function getNewsletterFontColor()
    {
        $configValue = $this->getConfig(self::NEWSLETTER_FONT_COLOR);
        return !empty($configValue)? '#'.$configValue: self::DEFAULT_NEWSLETTER_FONT_COLOR;
    }

    /**
     * @inheritdoc
     */
    public function getNewsletterButtonColor()
    {
        $value=  $this->getConfig(self::NEWSLETTER_BUTTON_FONT);
        return !empty($value)? '#'.$value:'#1979c3';
    }

    /**
     * @inheritdoc
     */
    public function getNewsletterPlaceholder()
    {
        $value =  $this->getConfig(self::NEWSLETTER_PLACEHOLDER);
        return !empty($value)? $value: __('Enter your email address');
    }

    /**
     * @inheritdoc
     */
    public function getNewsletterLabelText()
    {
        $value =  $this->getConfig(self::NEWSLETTER_LABEL_TEXT);
        return !empty($value)? $value: __('Sign Up for Our Newsletter:');
    }

    /**
     * @inheritdoc
     */
    public function getNewsletterButtonText()
    {
        $value =  $this->getConfig(self::NEWSLETTER_BUTTON_TEXT);
        return !empty($value)? $value: __('Subscribe');
    }

    /**
     * @inheritdoc
     */
    public function isFooterEnabled():bool
    {
        return $this->getFlagFieldValue(self::FOOTER_ENABLED);
    }

    /**
     * @inheritdoc
     */
    public function getPopupShowTime()
    {
        return $this->getConfig(self::POPUP_SHOW_TIME);
    }

    /**
     * @inheritdoc
     */
    public function getPopupWhereToShow()
    {
        return $this->getConfig(self::POPUP_WHERE_TO_SHOW);
    }

    /**
     * @inheritdoc
     */
    public function getPopupCookieExpire()
    {
        return $this->getConfig(self::POPUP_COOKIE_EXP);
    }
}
