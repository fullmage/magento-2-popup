# magento-2-popup

FullMage team has developed Popup extension for Magento 2 to create and customize popup. It will useful as promotion popup, newsletter popup, contact form popup, and image popup. Using these feature, You can set offer promotional, newsletter subscription, sale offer banner etc. to boost site and increase revenue.

## KEY FEATURES

- Allow to Set Popup Height and Width from Configuration.
- Allow to Select Option for Display Content from Configuration.
- Allow to Select Option for Display Content from Configuration.
- Allow to Choose to Show/Hide Footer in Popup from Configuration.
- Allow to Choose to Show/Hide Newsletter in Popup from Configuration.
- Allow to Choose Newsletter Label & Button Font Color in Popup from Configuration.
- Allow to Choose Newsletter Label Text, Button Text and Placeholder Text in Popup from Configuration.

## How Does The Extension Work?

The admin user need to enable extension from store configuration. The admin user can select popup height & width in pixel format. If it will blank then, it will set by default value. For display content in popup, the admin user can select option from store configuration. The admin has also able to choose options for show/hide footer & newsletter in popup. The admin can able to set newsletter button label color, font color, label text, button text & button placeholder from configuration.

## How to Enable Extension and Display Popup on Store Front?

- Login to Admin Panel.
- Store -> Configuration -> FULLMAGE -> General Configuration -> Enable -> Set Value "Yes".
- Now, Select "Select Contet to Content" value in this field and set content based on that.
- Save Configuration and check at front side.

Note : If popup is not display again after close popup. Then, it will create a cookie in your browser. If you want to show again then, you need to remove cookie otherwise, by default cookie will expire after 24 hours (1 day).

## Functionality

- Popup Width : Set width of popup in px. For eg : 800. By default it will set 800px.
- Popup Height : Set height of popup in px. For eg : 500. By default it will set 500px.
- Where to Show : Allow to set it will be display only on home page or it will be display on all page.
- After X seconds : How many seconds you'd like to wait before displaying the popup. If this field is blank it will display on page load with no delay.
- Show Popup Again to the Same Visitor after How Many Days? : Set the value of how many days before showing the popup again to the same visitor. By default if this field is left blank once the popup is closed by a visitor it will not show again for 1 day (24 hours).
- Select Content to Display : It will allow to choose from where content should be display. 
  - Custom : It will allow you to set custom popup content by "Popup Heading" & "Popup Message". In "Popup Message", you can also insert widget, images etc. using wysiwyg editor field.
  - From CMS Block :  It will allow you to load content from specific CMS blocks. For that, You need to select the CMS block in the "Select CMS Block" field.
Note : Content should be available in the CMS block which you will select in configuration. To verify that, Go to Content -> Elements -> Blocks -> Open CMS Block and check if content is set or not. Otherwise, the popup will display blank.
  - Simple Newsletter Sign Up : it will allow you to display newsletter sign up form in popup. For that, If You want to upload an image to display as a background in popup then, you need to upload the image in the "Image Upload" field.
- Show Footer Button in Popup : It will allow you to choose whether the footer button should be displayed in popup or not. Footer Button will not display when Display Content will be as Simple Newsletter Sign Up.
- Button Background Color : It will allow to select footer button background color. This option will only show when "Show Footer in Popup" value is "Yes". By default font color will be set "#ffffff" if value is empty.
- Button Font Color : It will allow to select footer button font color. This option will only show when "Show Footer in Popup" value is "Yes". By default font color will be set "#333" if value is empty.
- Button Text : It will allow setting footer button text. This option will only show when the "Show Footer in Popup" value is "Yes". By default text will be set "Close" if the value is empty.
- Show Newsletter Subscribe Form in Popup : It will allow you to choose whether newsletter subscribe form should be displayed in popup or not. This option will only display when Display Content will be as Image Upload.
- Newsletter Label Font Color : It will allow you to choose newsletter form label font color. This option will only display when "Show Newsletter Subscribe Form in Popup" is "Yes". By default value is "#1979c3" when this field value is empty.
- Newsletter Button Font Color : It will allow you to choose newsletter form button font color. This option will only display when "Show Newsletter Subscribe Form in Popup" is "Yes". By default value is "#1979c3" when this field value is empty.
- Newsletter Label Text : It will allow to set newsletter form label text. This option will only display when "Show Newsletter Subscribe Form in Popup" is "Yes". By default value is "Sign Up for Our Newsletter:" when this field value is empty.
- Newsletter Textbox Placeholder : It will allow you to set a newsletter form textbox placeholder text. This option will only display when "Show Newsletter Subscribe Form in Popup" is "Yes". By default the value is "Enter your email address" when this field value is empty.
- Newsletter Button Text : It will allow you to set newsletter form button text. This option will only display when "Show Newsletter Subscribe Form in Popup" is "Yes". By default the value is "Subscribe" when this field value is empty.
