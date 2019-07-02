<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $nazv
 * @property string $pic
 * @property string $opis
 *
 @property Comm[] $comms
 * @property Mypage[] $mypages
 */
class Blog extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pic', 'opis'], 'string'],
            [['nazv'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazv' => 'Nazv',
            'pic' => 'Pic',
            'opis' => 'Opis',
        ];
    }

    public function saveImage($filename)
    {
        $this->pic = $filename;
        $this->save(false);

    }

    public function getImage()
    {
        if (($this->pic)) {
            return '/uploads/' . $this->pic;
        } else {
            return '/no-image.jpg';
        }
    }

    public static function getAll($pageSize = 5)
    {
//        $query = blog::find();
//        $count = $query->count();
//        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 1]);
//        $blog = $query->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();
//        return $this->render('index', ['blog' => $blog,
//            'pagination' => $pagination]);

        $query = Blog::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

        // limit the query using the pagination and retrieve the articles
        $blogs = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['blogs'] = $blogs;
        $data['pagination'] = $pagination;

        return $data;
    }
/**
     * @return \yii\db\ActiveQuery
     */
public function getComments()
{
    return $this->hasMany(Comm::className(), ['id_news'=>'id']);
}

    public function getBlogComments()
    {
        return $this->getComments()->all();
    }

}
