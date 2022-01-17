<?php

namespace internal\domain\thread\service;

use internal\domain\thread\entity\consts\EnumPost;
use internal\domain\thread\entity\Post;
use internal\domain\thread\entity\post\valueobject\ApprovePending;
use internal\domain\thread\entity\post\valueobject\Denied;
use internal\domain\thread\entity\post\valueobject\Passed;
use internal\domain\thread\entity\post\valueobject\PendingReview;
use internal\domain\thread\repository\po\PostPO;

class PostFactory
{

    public function createPostPO(Post $post): PostPO
    {
        $postPO = $post->postPO;
        if (!$postPO) {
            $postPO = new PostPO();
        }
        $postPO->reply_user_id = $post->replyUserId;

        $postPO->review_status = $post->reviewStatus->value;
        $postPO->recheck_status = $post->recheckStatus;
        $postPO->created_at = $post->createdAt;
        if ($post->updatedAt) {
            $postPO->updated_at = $post->updatedAt;
        }
        if ($post->deletedAt) {
            $postPO->deleted_at = $post->deletedAt;
        }

        return $postPO;
    }

    public function createPost(?PostPO $postPO): Post
    {
        switch ($postPO->review_status) {
            default:
            case EnumPost::REVIEW_STATUS_PENDING_APPROVE:
                $reviewStatus = new ApprovePending();
                break;
            case EnumPost::REVIEW_STATUS_PENDING_REVIEW:
                $reviewStatus = new PendingReview();
                break;
            case EnumPost::REVIEW_STATUS_PASSED:
                $reviewStatus = new Passed();
                break;
            case EnumPost::REVIEW_STATUS_DENIED:
                $reviewStatus = new Denied();
                break;
        }

        $post = new Post();
        $post->postPO = $postPO;
        $post->id = $postPO->id;
        $post->threadId = $postPO->thread_id;
        $post->userId = $postPO->user_id;
        $post->replyUserId = $postPO->reply_user_id;
        $post->floor = $postPO->floor;
        $post->isAnonymous = $postPO->is_anonymous;
        $post->isFirst = $postPO->is_first == 1;

        $reviewStatus->setPost($post);
        $post->changeReviewStatus($reviewStatus);
        $post->isApproved = $postPO->is_approved;
        $post->isReApproved = $postPO->is_re_approved;

        $post->createdAt = $postPO->created_at;
        $post->updatedAt = $postPO->updated_at;
        $post->deletedAt = $postPO->deleted_at;
        $post->content = $postPO->content;
        $post->replyPostId = intval($postPO->reply_post_id);

        return $post;
    }

}
