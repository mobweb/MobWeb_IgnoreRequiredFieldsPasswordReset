# MobWeb_IgnoreRequiredFieldsPasswordReset extension for Magento

This extension disables the validation of the DOB, gender and tax/vat number during the password reset. Because of this validation, a customer is unable to reset their password if one of these fields is set to be required but is empty for this customer. They can't log in to their account to enter the required fields since they forget their password. This extension fixes that.

Based on [this Stackexchange answer](http://magento.stackexchange.com/a/29603/3830) by [Marius Strajeru](https://github.com/tzyganu/).

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).