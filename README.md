==================
eventbrite-sdk-php
==================


* Official Eventbrite_ SDK for PHP
* API Reference: https://developer.eventbrite.com/docs/
* You can register an Eventbrite app at https://www.eventbrite.com/myaccount/apps/


Installation
------------
Clone the repo. Once this is public we can add version control and installation via composer.

The Eventbrite PHP SDK makes it easy to interact with the Eventbrite API:

.. code-block:: php

    php > $client = new exiang\eventbrite\HttpClient(USER_TOKEN);
    php > $user = $client->get_user(1234567890);
    php > $user['id'];
    php > 1234567890
    php > $user['name'];
    php > Serena Williams

You can also specify API endpoints manually:

.. code-block:: php

    php > $user = $client->get('/users/me/');
    php > $user['id'];
    1234567890
    php > $user['name'];
    php > Serena William


License
-------

The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
