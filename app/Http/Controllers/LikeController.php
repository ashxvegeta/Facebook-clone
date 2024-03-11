<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikeController extends Controller
{
    //
    function who_liked(Request $request) {
        $type = $request->input("type");
        $postid = $request->input("id");
    
        if ($type == "post") {
            $like = Like::where("type", "post")
                ->where("contentid", $postid)
                ->first();
    
            if ($like) {
                $likes = json_decode($like->likes, true);
                $user_emails = array_column($likes, "useremail");
                $userWholiked = User::whereIn("email", $user_emails)->get();
                
                return view('who_liked',compact('userWholiked'));
               
                
                
            }
        }
    }

  

    function likePost(Request $request)
    {
        $type = $request->input("type");
        $postid = $request->input("id");
        $email = session()->get("user")["email"];

        if ($type == "post") {
            $like = Like::where("type", "post")
                ->where("contentid", $postid)
                ->first();

            if ($like) {
                $likes = json_decode($like->likes, true);

                $user_ids = array_column($likes, "useremail");

                if (!in_array($email, $user_ids)) {
                    
                    // User hasn't liked the post, add a like
                    $new_like = [
                        "useremail" => $email,
                        "date" => now()->format("Y-m-d H:i:s"),
                    ];

                    $likes[] = $new_like;
                    $updated_likes = json_encode($likes);

                    // Update likes data in the "likes" table
                    $like->update(["likes" => $updated_likes]);

                    // Increment the "likes" count in the "posts" table
                    Post::where("postid", $postid)->increment("likes", 1);

                    return redirect()->back();
                } else {
                    // User has already liked the post, remove the like
                    $key = array_search($email, $user_ids);

                    unset($likes[$key]);

                    $updated_likes = json_encode(array_values($likes));

                    // Update likes data in the "likes" table
                    $like->update(["likes" => $updated_likes]);

                    // Decrement the "likes" count in the "posts" table
                    Post::where("postid", $postid)
                        ->limit(1)
                        ->decrement("likes", 1);

                    return redirect()->back();
                }
            } else {
                $new_like = [
                    "useremail" => $email,
                    "date" => now()->format("Y-m-d H:i:s"),
                ];

                $likes = [$new_like];
                $likes_string = json_encode($likes);

                //insert a fresh new like 1st time

                Like::create([
                    "type" => "post",
                    "contentid" => $postid,
                    "likes" => $likes_string,
                ]);

                //increment the lieks  count in the psot table

                Post::where("postid", $postid)
                    ->limit(1)
                    ->increment("likes", 1);

                return redirect()->back();
            }
        }
    }


   
    function  follow(Request $request){
         
        $type = $request->input("type");
        $postid = $request->input("id");
        $email = session()->get("user")["email"];

        if ($type == "user") {
            $like = Like::where("type", "$type")
                ->where("contentid", $postid)
                ->first();

            if ($like) {
                $likes = json_decode($like->likes, true);
                $user_ids = array_column($likes, "useremail");

                if (!in_array($email, $user_ids)) {
                     // User hasn't liked the post, add a like
                    $new_like = [
                        "useremail" => $email,
                        "date" => now()->format("Y-m-d H:i:s"),
                    ];
                    $likes[] = $new_like;
                    $updated_likes = json_encode($likes);
                    // Update likes data in the "likes" table
                    $like->update(["likes" => $updated_likes]);
                    // Increment the "likes" count in the "posts" table
                    User::where("email", $postid)->increment("likes", 1);
                } else {
                    // User has already liked the post, remove the like
                    $key = array_search($email, $user_ids);
                    unset($likes[$key]);
                    $updated_likes = json_encode(array_values($likes));
                    // Update likes data in the "likes" table
                    $like->update(["likes" => $updated_likes]);
                    // Decrement the "likes" count in the "posts" table
                    User::where("email", $postid)
                        ->limit(1)
                        ->decrement("likes", 1);
                }
            } else {
                $new_like = [
                    "useremail" => $email,
                    "date" => now()->format("Y-m-d H:i:s"),
                ];
                $likes = [$new_like];
                $likes_string = json_encode($likes);
                //insert a fresh new like 1st time
                Like::create([
                    "type" => $type,
                    "contentid" => $postid,
                    "likes" => $likes_string,
                ]);
                //increment the lieks  count in the psot table
                User::where("email", $postid)
                    ->limit(1)
                    ->increment("likes", 1);
            }

            $followings = like::where("type", "$type")
            ->where("contentid", $email)
            ->first();    
            if($followings){
                $followings1 = json_decode($followings->following, true);
                if (!is_array($followings1)) {
                    $followings1 = [];
                }
                $followingids = array_column($followings1, "useremail");
                if (!in_array($postid,$followingids)) {
                    // User hasn't liked the post, add a like
                    $new_following = [
                        "useremail" => $postid,
                        "date" => now()->format("Y-m-d H:i:s"),
                    ];
                    $followings1[] = $new_following;
                    $updated_followings = json_encode($followings1);
                    Like::where('contentid', $email)
                    ->where('type', $type)
                    ->update(["following" => $updated_followings]);
                }
                else{
                    $key2 = array_search($postid,$followingids);
                    unset($followings1[$key2]);
                    $updated_followings = json_encode(array_values($followings1)); 
                    $followings->update(["following"=>$updated_followings]);
                }
            }
            else{
                $new_following = [
                    "useremail"=>$email,
                    "date"=> now()->format("Y-m-d H:i:s"),
                ];
                $following = [$new_following];
                $following_string = json_encode($following);
                //insert a fresh new following 1st time
                $followings->update(["following" => $following_string]);

            }
            
        }

        return redirect()->back();
    }


}
