<?php
namespace app\controllers;

use yii\base\Controller;
use app\models\Article;
use app\models\Category;

class HomeController extends Controller
{
    public $layout = 'home';

    public function actionIndex() 
    {
        $request = \Yii::$app->request;
        $id = $request->get('id', 1);
        $sql = 'Select * from article where id=:id';

        // $data = Article::find()->where(['like','title', '的'])->asArray()->all();
        // // $data = Article::findAll([3,'title', '的']);
        // dd($data);
        // foreach(Article::find()->batch(2) as $articles) {
        //     echo count($articles).'-';
        //     // dd($articles);
        // }

        // // 添加记录
        // $article = new Article();
        // $article->title = '9999999';
        // $article->num = 2;
        // // $data = $article->insert();
        // $data = $article->save();
        // dd($article->attributes['id']);

        // // 修改记录
        // $article = Article::findOne(1);
        // $article->title = "新个税法实施后年终奖如何交税？答案明确了";
        // $article->num++;
        // // $data = $article->update();
        // $data = $article->save();
        
        // // 修改单个/多个字段
        // $article = Article::updateAllCounters(['num'=>1], ['id' => 8]);
        
        // 删除数据
        // $article = Article::findOne(20);
        // $article = Article::find()->where(['id'=> 22])->one();
        // $data = $article->delete();
        // $article = Article::find()->where(['id'=> 21])->all();
        // $data = $article[0]->delete();
        // Article::deleteAll('id=19');
        // dd($article);
        return $this->render('index');
    }

    public function actionAbout() 
    {
        // $category = Category::findOne(2);
        // $articles = Article::find()->where(['cate_id' => $category->attributes['id'] ])->all();
        // $articles = $category->hasMany(Article::className(), ['cate_id' => 'id'])->all();
        // $articles = $category->getArticles();
        // $articles = $category->articles;

        // $article = Article::findOne(3);
        // // $category = $article->hasOne(Category::className(), ['id' => 'cate_id'])->all();
        // $category = $article->getCategory();
        // $category = $article->category;

        // join
        $articles = Article::find()->with('category')->asArray()->all();
        dd($articles);
        return $this->render('about');
    }
}