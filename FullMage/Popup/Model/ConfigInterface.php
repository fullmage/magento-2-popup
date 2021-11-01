<?php

declare(strict_types=1);

namespace FullMage\Popup\Model;

use Magento\Framework\Exception\NoSuchEntityException;

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

    const DEFAULT_BG_COLOR = '#ffffff';

    const DEFAULT_BUTTON_FONT_COLOR = '#333';

    const DEFAULT_NEWSLETTER_FONT_COLOR = '#ffffff';
    /**
     * Get Config Value
     *
     * @param string $path
     * @param null|int $storeId
     * @return mixed
     */
    public function getConfig($path, $storeId = null);

    /**
     * Enabled Setting
     *
     * @param int|null $storeId
     * @return bool
     * @throws NoSuchEntityException
     */
    public function isEnabled(int $storeId = null): bool;

    /**
     * Get Popup width
     *
     * @return mixed
     */
    public function getPopupWidth();

    /**
     * Get Pop-up height
     *
     * @return mixed
     */
    public function getPopupHeight();

    /**
     * Get Popup  Heading
     *
     * @return mixed
     */
    public function getPopupHeading();

    /**
     * Pop Message
     *
     * @return mixed
     */
    public function getPopupMessage();

    /**
     * Pop cms block
     *
     * @return mixed
     */
    public function getPopupCmsBlock();

    /**
     * Get pop content type
     *
     * @return mixed
     */
    public function getPopupContentType();

    /**
     * Get Button text
     *
     * @return mixed
     */
    public function getButtonText();

    /**
     * Get Button Front Color
     *
     * @return mixed
     */
    public function getButtonFontColor();

    /**
     * Button background color
     *
     * @return mixed
     */
    public function getButtonBgColor();

    /**
     * Is Show newsletter
     *
     * @return bool
     * @throws NoSuchEntityException
     */
    public function getShowNewsletter():bool;

    /**
     * Newsletter font color
     *
     * @return mixed
     */
    public function getNewsletterFontColor();

    /**
     * Newsletter button color
     *
     * @return mixed
     */
    public function getNewsletterButtonColor();

    /**
     * Newsletter placeholder
     *
     * @return mixed
     */
    public function getNewsletterPlaceholder();

    /**
     * Newsletter label text
     *
     * @return mixed
     */
    public function getNewsletterLabelText();

    /**
     * Newsletter button text
     *
     * @return mixed
     */
    public function getNewsletterButtonText();

    /**
     * Is enabled footer
     *
     * @return bool
     * @throws NoSuchEntityException
     */
    public function isFooterEnabled():bool;

    /**
     * POPUP show time
     *
     * @return mixed
     */
    public function getPopupShowTime();

    /**
     * Pop position
     *
     * @return mixed
     */
    public function getPopupWhereToShow();

    /**
     * Popup Cookie Expire
     *
     * @return mixed
     */
    public function getPopupCookieExpire();
}
