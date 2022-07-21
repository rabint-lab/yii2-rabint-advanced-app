<?php
/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 4/29/19
 * Time: 5:15 AM
 */

namespace common\models\base;


//class DbAuthManager extends \yii\mongodb\rbac\MongoDbManager
class DbAuthManager extends \yii\rbac\DbManager
{
    public $itemTable = '{{%user_rbac_auth_item}}';
    public $itemChildTable = '{{%user_rbac_auth_item_child}}';
    public $assignmentTable = '{{%user_rbac_auth_assignment}}';
    public $ruleTable = '{{%user_rbac_auth_rule}}';

    public $itemCollection = 'user_auth_item';
    public $assignmentCollection = 'user_auth_assignment';
    public $ruleCollection = 'user_auth_rule';
}