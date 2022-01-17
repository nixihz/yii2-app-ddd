<?php

namespace internal\domain\thread\repository\po;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts".
 *
 * @property int $id 回复 id
 * @property int|null $user_id 发表用户 id
 * @property int|null $thread_id 关联主题 id
 * @property int|null $reply_post_id 回复 id
 * @property int|null $reply_user_id 回复用户 id
 * @property int|null $comment_post_id 评论回复 id
 * @property int|null $comment_user_id 评论回复用户 id
 * @property string|null $content 内容
 * @property string $ip ip 地址
 * @property int $port 端口
 * @property int $reply_count 关联回复数
 * @property int $like_count 喜欢数
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string|null $deleted_at 删除时间
 * @property int|null $deleted_user_id 删除用户 id
 * @property int $is_first 是否首个回复
 * @property int $is_comment 是否是回复回帖的内容
 * @property int $is_approved 是否合法
 * @property int $review_status
 * @property int $recheck_status
 * @property int $is_re_approved 是否回查
 * @property int $is_image 包含图片
 * @property int $is_anonymous 是否匿名 0否 1是
 * @property int $floor 帖子楼层
 */
class PostPO extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'thread_id',
                    'review_status',
                    'reply_post_id',
                    'reply_user_id',
                    'comment_post_id',
                    'comment_user_id',
                    'port',
                    'reply_count',
                    'like_count',
                    'deleted_user_id',
                    'is_first',
                    'is_comment',
                    'is_approved',
                    'is_re_approved',
                    'is_image',
                    'is_anonymous',
                    'floor'
                ],
                'integer'
            ],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['ip'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '回复 id',
            'user_id' => '发表用户 id',
            'thread_id' => '关联主题 id',
            'reply_post_id' => '回复 id',
            'reply_user_id' => '回复用户 id',
            'comment_post_id' => '评论回复 id',
            'comment_user_id' => '评论回复用户 id',
            'review_status' => 'review_status',
            'content' => '内容',
            'ip' => 'ip 地址',
            'port' => '端口',
            'reply_count' => '关联回复数',
            'like_count' => '喜欢数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
            'deleted_user_id' => '删除用户 id',
            'is_first' => '是否首个回复',
            'is_comment' => '是否是回复回帖的内容',
            'is_approved' => '是否合法',
            'is_re_approved' => '是否回查',
            'is_image' => '包含图片',
            'is_anonymous' => '是否匿名 0否 1是',
            'floor' => '帖子楼层',
        ];
    }
}
