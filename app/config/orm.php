<?php
ORM::configure('mysql:host='.DB_SERVER.';dbname='.DB_NAME);
ORM::configure('username', DB_USERNAME);
ORM::configure('password', DB_PASSWORD);
ORM::configure('logging', true);
