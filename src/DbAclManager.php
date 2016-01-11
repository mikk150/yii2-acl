<?php

namespace mikk150\acl;

use yii\base\Component;
use yii\db\Query;
use yii\db\Connection;
use Yii;

/**
 *
 */
class DbAclManager extends Component
{
    public $connection = 'db';

    public function init()
    {
        parent::init();
        if (is_string($this->connection)) {
            $this->connection = Yii::$app->get($this->connection);
        } elseif (is_array($this->connection)) {
            if (!isset($this->connection['class'])) {
                $this->connection['class'] = Connection::className();
            }
            $this->connection = Yii::createObject($this->connection);
        }
        if (!$this->connection instanceof Connection) {
            throw new InvalidConfigException('Queue::connection must be application component ID of a SQL connection.');
        }
    }

    public function checkAccess($userId, $permissionName, $params = [])
    {
        $query = new Query();
        $hasAccess = $query->select('id')->from('acl_user_permissions')
        ->join('JOIN', 'acl_permissions', 'acl_permissions.id = acl_user_permissions.permission_id')
        ->where([
            'acl_user_permissions.user_id' => $userId,
            'acl_permissions.permission' => $permissionName,
        ])->one();

        return (bool) $hasAccess;
    }
}
