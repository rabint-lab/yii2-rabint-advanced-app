به نام خداوند بخشنده و مهربان
---

Rabint Yii2 starter kit

پروژه کیت شروع به کار پروژه بر پایه فریمورک yii2 رابینت


----------------------------------


#how to install:

1. download OR clone with git
```
git clone https://gitlab.com/rabint-yii/sample-app.git
```
Or create with composer:
```
composer create-project rabint-yii/sample-app path --repository-url=git@gitlab.com:rabint-yii/sample-app.git
```

2. composer install
```
php composer.phar install
```
3. set your env : copy ```env.dist.php``` to ```env.php``` and edit this file if you need.

4. set db config in ```_env/{your_env}.php```
4. go to app folder  ```$ cd app```
5. apply migrations : ``` $ php yii migrate```
5. apply migrations : ``` $ php yii rbac-migrate```


###env customize per app

you can copy `_env` folder to `app_folder/_env`

include hierarchy:

1- app_folder/_env/env_file

2- _env/env_file

3- app_folder/_env/base_env.php

4- _env/base_env.php



###migration generate

$ php yii migrate-generate/create [table_name]

###For other usefull commands see:
`vendor/rabint/base/_doc/console_commands.md`