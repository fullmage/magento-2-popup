<?php
declare(strict_types=1);

namespace FullMage\Popup\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
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
     * @inheridoc
     */
    public function getConfig($path, $storeId = null)
    {
        if ($storeId === null){
            $storeId = (int) $this->storeManager->getStore()->getId();
        }
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get Yes/no field value
     *
     * @param string $xmlPath
     * @param int|null $storeId
     * @return bool
     * @throws NoSuchEntityException
     */
    private function getFlagFieldValue(string $xmlPath ,int $storeId = null): bool
    {
        if ($storeId === null){
            $storeId = (int) $this->storeManager->getStore()->getId();
        }
        return $this->scopeConfig->isSetFlag(
            $xmlPath,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
    /**
     * @inheridoc
     */
    public function isEnabled(int $storeId = null): bool
    {
        return  $this->getFlagFieldValue(self::POPUP_ENABLED,$storeId);
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
        $configValue = $this->getConfig(self::BUTTON_FONT_COLOR);
        return !empty($configValue)? '#'.$configValue: self::DEFAULT_BUTTON_FONT_COLOR;
    }

    /**
     * @inheridoc
     */
    public function getButtonBgColor()
    {
        $configValue = $this->getConfig(self::BUTTON_BG_COLOR);
        return !empty($configValue)? '#'.$configValue: self::DEFAULT_BG_COLOR;
    }

    /**
     * @inheridoc
     */
    public function getShowNewsletter():bool
    {
        return $this->getFlagFieldValue(self::SHOW_NEWSLETTER);
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
    public function isFooterEnabled():bool
    {
        return $this->getFlagFieldValue(self::FOOTER_ENABLED);
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
