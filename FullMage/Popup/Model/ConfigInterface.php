<?php

declare(strict_types=1);

namespace FullMage\Popup\Model;

interface ConfigInterface
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
     * Get Config Value
     *
     * @param string $path
     * @param null|int $storeId
     * @return mixed
     */
    public function getConfig($path, $storeId = null);

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * @return mixed
     */
    public function getPopupWidth();

    /**
     * @return mixed
     */
    public function getPopupHeight();

    /**
     * @return mixed
     */
    public function getPopupHeading();

    /**
     * @return mixed
     */
    public function getPopupMessage();

    /**
     * @return mixed
     */
    public function getPopupCmsBlock();

    /**
     * @return mixed
     */
    public function getPopupContentType();

    /**
     * @return mixed
     */
    public function getButtonText();

    /**
     * @return mixed
     */
    public function getButtonFontColor();

    /**
     * @return mixed
     */
    public function getButtonBgColor();

    /**
     * @return mixed
     */
    public function getShowNewsletter();

    /**
     * @return mixed
     */
    public function getNewsletterFontColor();

    /**
     * @return mixed
     */
    public function getNewsletterButtonColor();

    /**
     * @return mixed
     */
    public function getNewsletterPlaceholder();

    /**
     * @return mixed
     */
    public function getNewsletterLabelText();

    /**
     * @return mixed
     */
    public function getNewsletterButtonText();

    /**
     * @return mixed
     */
    public function isFooterEnabled();

    /**
     * @return mixed
     */
    public function getPopupShowTime();

    /**
     * @return mixed
     */
    public function getPopupWhereToShow();

    /**
     * @return mixed
     */
    public function getPopupCookieExpire();
}
