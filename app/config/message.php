<?php

return \yii\helpers\ArrayHelper::merge(
                require(\Yii::getAlias('@rabint/config/messages/rabint.php')), [
            'messagePath' => Yii::getAlias('@app/messages'),
            'overwrite' => true,
            'only' => ['*.php'],
            'except' => [
                '.svn',
                '.git',
                '.gitignore',
                '.gitkeep',
                '.hgignore',
                '.hgkeep',
                '/messages',
                '/vendor',
            ],
                ]
);


