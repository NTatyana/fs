<?php

namespace App\Http\Controllers;

use App\Article_Tag;
use App\Categorie;
use App\Comment;
use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\article;

class ArticleController extends Controller
{

//Declear variables (обьявление переменных)

//    public $lastId = 0;


// Create new article and save it

    public function newArticle()
    {

        $categorie = Categorie::all();
        $tags = Tag::all();


        $array = array(
            'categories_name' => $categorie,
            'tags_name' => $tags

        );

        return view('admin.newArticle', $array);
    }


    public function saveArticle(Request $request)
    {
        $tags = Tag::all();
        $categorie = Categorie::all();
        $comments = Comment::all();



        $indexTag = Tag::all()->last()->id;
//        dd($indexTag);


        if ($request->isMethod('post')) {
            $request->flash();

            $newArticle = new article();

            $newArticle->name = $request->input('name');
            $newArticle->text = $request->input('text');
            $newArticle->img = 'img5';

            //$file = $request->file('image');

            $newArticle->categories_id = $request->input('categories');


            $newArticle->save();

            $lastArticleId = article::all()->last();


            for ($i = 1; $i <= $indexTag; $i++) {
                if ($request->input('checkbox'.$i) != null) {
                    $newArticleTags = new Article_Tag();
                    $newArticleTags->article_id = $lastArticleId->id;
                    $newArticleTags->tag_id = $request->input('checkbox'.$i);
                    $newArticleTags->save();
                }
            }


        }


        $array = array(
            'categories_name' => $categorie,
            'tags_name' => $tags,
            'comments' => $comments

        );

        return view('admin.newArticle', $array);
    }


// end


// List of articles ( список статей)

    public function listArticles()
    {

        $article = article::all();

        return view('admin.listArticles')->with('article', $article);

    }

// End


// Edit articles (редактировать статью)

    public function editArticles($id = false)
    {

        if ($id != false) {
            $tags = Tag::all();
            $categorie = Categorie::all();
            $article = article::find($id);

            $comments = $article->comments;



        } else {
            $tags = null;
            $categorie = null;
            $article = article::all()->last();
            $comments = $article->comments;


        }

        $array = array(
            'categories_name' => $categorie,
            'tags_name' => $tags,
            'comments' => $comments
        );

        return view('admin.EditArticle', $array)->with('article', $article);


    }


    public function saveEditArticle(Request $request)
    {

        $tags = Tag::all();
        $categorie = Categorie::all();
        $comments = Comment::all();


        $array = array(
            'categories_name' => $categorie,
            'tags_name' => $tags,
            'comments' => $comments

        );

        $indexTag = Tag::all()->last()->id;


        if ($request->isMethod('post')) {
            $request->flash();

            $idArticle = $request->input('id');

            $editArticle = article::find($idArticle);

            $editArticle->name = $request->input('name');
            $editArticle->text = $request->input('text');
            $editArticle->categories_id = $request->input('categories');

            for ($i = 1; $i <= $indexTag; $i++) {
//                dd($indexTag);

                if ($request->input('checkbox'.$i) != null) {
                    $newArticleTags = new Article_Tag();
                    $newArticleTags->article_id = $idArticle->id;
                    $newArticleTags->tag_id = $request->input('checkbox'.$i);
                    $newArticleTags->save();
                }
            }

            $editArticle->save();

        }

        return view('admin.EditArticle', $array)->with('article', $editArticle);
    }


    public function deleteArticle ($id){

        $tags = Tag::all();
        $categorie = Categorie::all();
        $comments = Comment::all();


        $array = array(
            'categories_name' => $categorie,
            'tags_name' => $tags,
            'comments' => $comments

        );


        if($id != null){

            $deleteArticle = article::find($id);
            if($deleteArticle != null) {
                $deleteArticle->delete();
            }
        }


        return view('admin.newArticle', $array);
    }

//End








//Comments

    public function newComment(){

        $article = article::all();
        $comments = $article->comments;


        return view('admin.listArticles')->with('article', $article, 'comments', $comments);

    }



    public function saveComment(Request $request){

        if ($request->isMethod('post')) {
            $request->flash();

            $newComment = new Comment();

            $newComment->name = $request->input('name');
            $newComment->text = $request->input('text');
            $newComment->article_id = $request->input('artId');

            $newComment->save();

        }

        $article = article::all();
        $comments = Comment::all();

        return view('admin.listArticles')->with('article', $article, 'comments', $comments);


    }



    public function deleteComment($id)
    {

        $article = article::all();
        $comments = Comment::all();


        if($id != null){

            $deleteComment = Comment::find($id);
            if($deleteComment != null) {
                $deleteComment->delete();
            }
        }

        return view('admin.listArticles')->with('article', $article, 'comments', $comments);


    }



//End








// Create new tags and save it

    public function newTags()
    {
        $listOfTags = Tag::all();

        return view('admin.newTags')->with('listOfTags', $listOfTags);
    }


    public function saveTags(Request $request)
    {
        $listOfTags = Tag::all();


        if ($request->isMethod('post')) {
            $request->flash();

            $newTag = new Tag();

            $newTag->name = $request->input('name');
            $newTag->description = $request->input('text');

            $newTag->save();

        }

        return view('admin.newTags')->with('listOfTags', $listOfTags);
    }

//End




// Edit tags (редактировать теги)

    public function editTag($id = false)
    {

        if ($id != false) {
            $editTag = Tag::find($id);

        } else {
            $editTag = Tag::all()->last();
        }


        return view('admin.editTag')->with('editTag', $editTag);

    }


    public function saveEditTag(Request $request)
    {
        $listOfTags = Tag::all();


        if ($request->isMethod('post')) {
            $request->flash();

            $idOldTag = $request->input('id');
            $editOldTag = Tag::find($idOldTag);

            $editOldTag->name = $request->input('name');
            $editOldTag->description = $request->input('text');

            $editOldTag->save();


        }

        return view('admin.newTags')->with('listOfTags', $listOfTags);
    }



    public function deleteTag ($id){
        $listOfTags = Tag::all();

        if($id != null){

            $deleteTag = Tag::find($id);
            if($deleteTag != null) {
                $deleteTag->delete();
            }
        }

        return view('admin.newTags')->with('listOfTags', $listOfTags);
    }


//End








// Categories


    public function newCategories () {
        $listOfCategories = Categorie::all();

        return view('admin.newCategories')->with('listOfCategories', $listOfCategories);

    }



    public function saveCategories(Request $request){


            $listOfCategories = Categorie::all();


            if ($request->isMethod('post')) {
                $request->flash();

                $newCategorie = new Categorie();

                $newCategorie->name = $request->input('name');
                $newCategorie->text = $request->input('text');

                $newCategorie->save();

            }

            return view('admin.newCategories')->with('listOfCategories', $listOfCategories);

    }


    public function deleteCategories ($id){

        $listOfCategories = Categorie::all();

        if($id != null){

            $deleteCategorie = Categorie::find($id);
            if($deleteCategorie != null) {
                $deleteCategorie->delete();
            }
        }

        return view('admin.newCategories')->with('listOfCategories', $listOfCategories);
    }


    //  для коментирования gitHub




//End




}
