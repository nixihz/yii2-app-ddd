<?php

namespace internal\domain\demo\repository\po;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "demos".
 *
 * @property int $id id
 * @property string $comment comment
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class DemoPO extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment',], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'comment' => 'comment',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
