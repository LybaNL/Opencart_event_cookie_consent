# Opencart_event_cookie_consent
An Opencart event to inject changes into the frontend html

## Overview
An Opencart event to disable flat rate as soon as the minimum order limit has been reached in the cart.

## Supported Opencart versions
3.0.2.0

## Prerequisites
- This event assumes that you have the default footer included. In any other template you can change the hook value to find a unique reference in the HTML.

## Installation instructions
1. Execute AddEvent.sql on your Opencart database.
2. Add insertcookieconsent.php to DOMAIN/catalog/controller/event/

## Event structure
The event is structured with the following attributes
* Code   : Value shown in Opencart.
* Trigger: Moment on which the event is executed.
* Action : The file and public function that is executed.

*Values*
* Code   : inject_scripts
* Trigger: catalog/view/common/footer/after
* Actions: event/insertcookieconsent/inject_cookieconsent

## Remarks
- It is always recommended that you create a backup of your files and database before applying changes.
- No core files are adjusted by this event.
- In comparison to the [Opencart 2.2 Event documentation](https://github.com/opencart/opencart/wiki/Events-System) it is not required to register the event from the code. This is done via the SQL.

## Reference
Original script by iSense https://github.com/iSenseLabs/tutorials/tree/master/cookie-consent-notification-in-opencart
