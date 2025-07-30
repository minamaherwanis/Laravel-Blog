<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $postsFromDB = Post::all();


    
        return view('posts.index',['posts'=>$postsFromDB]);
    }
    public function show($postId){

        $singlePostFromDB=Post::findOrFail( $postId);                                  
        $singlePostFromDB=Post::find(id: $postId);                                    //model object
        // $singlePostFromDB=Post::where('id',operator: $postId)->first();           //model object
        // $singlePostFromDB=Post::where('id',$postId)->get();                       //collection object
        
        

        return view('posts.show',['post'=>$singlePostFromDB]);
    }
    public function create(){
        $users=User::all();
        return view('posts.create ',['users'=>$users]);

    }
    public function store(){
    //      $data=$_POST;
    //    $value=request();
    //     @dd($value->title,$value->all());
        $data=request()->all();
        $title=request()->title;
        $description=request()->description;
        $post_creater=request()->post_creater;

    //    @dd( $title,$description,$post_creater);



        // $post = new Post();
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();

        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creater'=>['required','exists:users,id']
        ]);

        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creater,

        ]);
        return to_route('posts.index');
    }
    public function edit(Post $post)
    {
        $users=User::all();

        return view('posts.edit',['users'=>$users,'post'=>$post] );
    }
    public function update($postId)
    {
        $title=request()->title;
        $description=request()->description;
        $post_creater=request()->post_creater;

        $singlePostFromDB=Post::find( $postId);
        $singlePostFromDB->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creater,
        ]);
        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creater'=>['required','exists:users,id']
        ]);
        
        
            

        return to_route('posts.show',$postId);
    }
    public function destroy($postid) 
    {
        $post = Post::find($postid); // جلب البوست باستخدام الـ id
        if ($post) {
            $post->delete(); // حذف البوست
        }
        return to_route('posts.index'); // إعادة التوجيه إلى صفحة الـ index
    }

    
//     public function destroy(Post $post)
// {
//     $post->delete(); // حذف البوست مباشرة بعد أن يتم ربطه تلقائيًا بالـ id
//     return to_route('posts.index'); // إعادة التوجيه إلى صفحة الـ index
// }

    
    
}