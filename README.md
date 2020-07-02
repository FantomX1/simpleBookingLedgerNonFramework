# simpleBookingLedgerNonFramework
Application built from components from three frameworks, composer autoloaded

1) issue 
`npm i startbootstrap-freelancer in web folder`


startbootstrap-freelancer template is copied from its node npm/yarn directory,
to be ammended and adjusted copied in it's own views directory as a Yii-style main.php layout file


2) updating doctrine entities by a command
`vendor/bin/doctrine orm:schema-tool:update --force`
must be run inside where it was initiated, docker container
