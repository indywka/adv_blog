<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]]
        ];
    }

    public function saveComment($id_news)
    {
        $comment = new Comm;
        $comment->comment    = $this->comment;
        $comment->id_user = Yii::$app->user->id;
        $comment->id_news = $id_news;

        return $comment->save();

    }
}