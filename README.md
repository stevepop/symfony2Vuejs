Symfony Vue.js Sample App
=============

A Symfony project demonstrating the use of Vue.js

Installation
------------

1. Clone this repository

2. Run `composer install`

3. Install node dependencies: `npm install`

4.  Ensure the following node dependencies are installed
    - browserify
    - babelify
    - vue

5. Update your paremeters.yml file with database credentials

6. Create schema: `bin/console doctrine:schema:create`

7. Create User: `bin/console sandbox:createUser`

8. Create Contacts: `bin/console sandbox:createContacts`

Requirements
------------
Symfony 3


Development
-----------
gulp watch

