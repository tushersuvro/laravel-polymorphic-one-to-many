<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        $posts = Post::with('comments')->get();
        foreach ( $posts as $post ) {
            echo $post->title;
            echo '<br>';
            foreach ($post->comments as $comment) {
                echo '&nbsp;&nbsp;'.$comment->comment;
                echo '<br>';
            }
            echo '<hr>';
        }
    }

    function create() {
        //
        $comments = ['comment 1', 'comment 2', 'comment 3'];

        $post = Post::create(['title' => 'test title']);
        foreach( $comments as $comment ) {
            $post->comments()->create( [ 'comment' => $comment ] );
        }

        return redirect()->route('posts.index');
    }

    function edit(Post $post) { //dd($post);
        //
        $post->load('comments');

        $post->update(['title' => 'test title 2']);

        $count = 4;
        foreach( $post->comments as $comment ) {
            $comment->update([
                'comment' => 'comment '.$count
            ]);
            $count++;
        }

        return redirect()->route('posts.index');
    }

    function delete(Post $post) {
        $post->load('comments'); //dd($post);

        if( $post->comments->isNotEmpty() ) {
            $post->comments->each->delete();
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
