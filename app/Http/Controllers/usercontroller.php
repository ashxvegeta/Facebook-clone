<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use App\Models\bio;
use App\Models\Like;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Reply;

class usercontroller extends Controller
{
    //
    function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            "password2" => "required|same:password",
            "gender" => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "retype_password" => bcrypt($request->password2),
            "gender" => $request->gender,
            "likes" => 0,
        ];
        user::insert($data);
        Session::flash("success", "Signup successful!");
        return redirect()->back();
    }

    function profile(Request $request, $email = null)
    {// clicked user data
        $email = $request->email;
        if ($email) {
            $user = User::where("email", $email)->first();
            $type = "user";
            $header_image = session()->get("user");
            $user_email = $user->email;
            $bio = bio::where("email", $user_email)->first();
            // $friends = User::where("email", "!=", $user_email)->get();
            $friendsdata = Like::where("type",$type)->where("contentid",$user_email )->first();
            if($friendsdata){
                $friendsresult  =  json_decode($friendsdata->following, true);
                if (is_array($friendsresult)) {
                    $friends = [];
                    foreach($friendsresult as $frnd){
                        $friendsresultdata =    user::where('email',$frnd['useremail'])->first();
                        if ($friendsresultdata) {
                            $friends[] = $friendsresultdata; 
                        }
                    }
                    
                }
            }
            $oldPosts = Post::orderBy("id", "DESC")->where("user_email", $user_email)->take(10)->get();
            $sidephotos = Post::orderBy("id", "DESC")->where("user_email", $user_email)->get();
            $ownpost = User::where("email", "=", $user_email)->get();
            return view("profile",compact("user","oldPosts","friends","ownpost","header_image","sidephotos","bio")
            );
        }
        // loggend in user data
        elseif (session()->has("user")) {

            // i you remove this line then loggin user follower will not display
            $user = User::where("email",session()->get("user")["email"])->first();
            $type = "user";
            $header_image = session()->get("user");
            $user_email = session()->get("user")["email"];
            //retriving friends of the user
            $bio = bio::where("email", $user_email)->first();
            // $friends = User::where("email", "!=", $user_email)->get();
            $friendsdata = Like::where("type",$type)->where("contentid",$user_email )->first();
            if($friendsdata){
                $friendsresult  =  json_decode($friendsdata->following, true);
                if (is_array($friendsresult)) {
                    $friends = [];
                    foreach($friendsresult as $frnd){
                        $friendsresultdata =    user::where('email',$frnd['useremail'])->first();
                        if ($friendsresultdata) {
                            $friends[] = $friendsresultdata; 
                        }
                    }
                    
                }
            }
            $oldPosts = Post::orderBy("id", "DESC")->where("user_email", $user_email)->take(10)->get();
            $sidephotos = Post::orderBy("id", "DESC")->where("user_email", $user_email)->get();
            return view("profile",compact("user","oldPosts","friends","header_image","sidephotos","bio"));
        } else {
          return redirect("/login");
        }
    }

    function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:6",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = User::where([["email", "=", $request->email]])->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put("user", $user);
            return redirect("/profile");
        } else {
            return redirect()->back();
        }
    }

    function posts(Request $request)
    {
        if (!$request->hasFile("file") && empty($request->post)) {
            // No file selected and empty textarea, redirect back to profile page
            return redirect("/profile");
        }
        $imageName = "";
        $has_image = 0;
        if ($request->hasFile("file")) {
            $image = $request->file("file");
            $imageName = $image->getClientOriginalName();
            $image->move(public_path("photo"), $imageName);
            $has_image = 1;
        }
        if ($request->session()->has("user")) {
            $length = rand(4, 19);
            $number = "";
            for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);
            $number .= $new_rand;
            }
            $post = new Post();
            $post->user_email = $request->session()->get("user")["email"];
            $post->post = $request->post;
            $post->postid = $number;
            $post->has_image = $has_image;
            $post->likes = 0;
            if ($imageName) {
                $post->image = $imageName;
                $post->has_image = $has_image;
            }
           $post->save();
           return redirect("/profile");
        }
    }

    function timeline()
    {
        if (session()->has("user")) {
        $user = session()->get("user");
        return view("timeline", compact("user"));
        } else {
            return redirect("/login");
        }
    }

    function changeImage()
    {

        

        if (session()->has("user")) {
            $profileimages = session()->get("user")["profile_image"];
            return response()->json(["profileImage" => $profileimages]);

        } else {
            return redirect("/login");
        }
    }


    // function changeImage()
    // {
    //     if (session()->has("user")) {
    //         $profileimages = session()->get("user")["profile_image"];
    //         return view("change_profile_image", compact("profileimages"));
    //     } else {
    //         return redirect("/login");
    //     }
    // }



    function uploadImage(Request $request)
    {
        //change profile image
        $is_cover_image = 0;
        $is_profile_image = 0;
        $has_image = 0;
        if ($image = $request->file("file")) {
            if ($mimeType = $image->getMimeType() == "image/jpeg") {
                $allowedSize = 1024 * 1024 * 3;
                if ($size = $image->getSize() < $allowedSize) {
                    if ($request->session()->has("user")) {
                        $user_email = $request->session()->get("user")["email"];
                        $imagename = $image->getClientOriginalName();
                        $image->move(public_path("photo"), $imagename);
                        User::where("email", $user_email)->update(["profile_image" => $imagename,]);
                        if ($request->session()->has("user")) {
                            $length = rand(4, 19);
                            $number = "";
                            $is_profile_image = 1;
                            $has_image = 1;
                            for ($i = 0; $i < $length; $i++) {
                                $new_rand = rand(0, 9);
                                $number .= $new_rand;
                            }
                            //posoting the post
                            $post = new Post();
                            $post->user_email = $request->session() ->get("user")["email"];
                            $post->post = $request->post;
                            $post->postid = $number;
                            $post->has_image = $has_image;
                            $post->is_profile_image = $is_profile_image;
                            $post->is_cover_image = $is_cover_image;
                            $post->likes = 0;
                            if ($imagename) {
                                $post->image = $imagename;
                                $post->has_image = $has_image;
                            }
                            $post->save();
                        }

                        // Update the session data with the new profile image
                        $user = $request->session()->get("user");
                        $user["profile_image"] = $imagename;
                        $request->session()->put("user", $user);
                        return redirect("/profile");
                    }
                } else {
                    return redirect()->back()->withErrors(["size" => "Only size of 3mb or lower is allowed",]);
                }
            } else {
                return redirect()->back()->withErrors([ "type" => "Only images of JPEG type are allowed",]);
            }
        } else {
            return redirect() ->back() ->withErrors(["empty" => "Please Select any image"]);
        }

        // Handle other cases, e.g., if file is not present or session user is not available
    }

    function upload_image(Request $request)
    {
        if ($image = $request->file("file")) {
            if ($mimeType = $image->getMimeType() == "image/jpeg") {
                $allowedSize = 1024 * 1024 * 3;
                if ($size = $image->getSize() < $allowedSize) {
                    if ($request->session()->has("user")) {
                        $user_email = $request->session()->get("user")["email"];
                        $imagename = $image->getClientOriginalName();
                        $image->move(public_path("photo"), $imagename);

                        User::where("email", $user_email)->update([
                            "profile_image" => $imagename,
                        ]);
                        // Update the session data with the new profile image
                        $user = $request->session()->get("user");
                        $user["profile_image"] = $imagename;
                        $request->session()->put("user", $user);

                        return redirect("/profile");
                    }
                } else {
                    return redirect()
                        ->back()
                        ->withErrors([
                            "size" => "Only size of 3mb or lower is allowed",
                        ]);
                }
            } else {
                return redirect()
                    ->back()
                    ->withErrors([
                        "type" => "Only images of JPEG type are allowed",
                    ]);
            }
        } else {
            return redirect()
                ->back()
                ->withErrors(["empty" => "Please Select any image"]);
        }

        // Handle other cases, e.g., if file is not present or session user is not available
    }

    // function changeCover()
    // {
    //     if (session()->has("user")) {
    //         $coverimage = session()->get("user")["cover_image"];

    //         return view("change_cover_image", compact("coverimage"));
    //     } else {
    //         return redirect("/login");
    //     }
    // }




    function changeCover()
    {
        if (session()->has("user")) {
            $coverimage = session()->get("user")["cover_image"];

            return response()->json(["cover_image" => $coverimage]);
        } else {
            return redirect("/login");
        }
    }



    function uploadCover(Request $request)
    {
        //update change cover

        $is_cover_image = 0;
        $is_profile_image = 0;
        $has_image = 0;

        if ($image = $request->file("file")) {
            if ($mimeType = $image->getMimeType() == "image/jpeg") {
                $allowedSize = 1024 * 1024 * 3;
                if ($size = $image->getSize() < $allowedSize) {
                    if ($request->session()->has("user")) {
                        $user_email = $request->session()->get("user")["email"];
                        $imagename = $image->getClientOriginalName();
                        $image->move(public_path("photo"), $imagename);

                        User::where("email", $user_email)->update([
                            "cover_image" => $imagename,
                        ]);

                        //poting the post

                        if ($request->session()->has("user")) {
                            $length = rand(4, 19);
                            $number = "";
                            $is_cover_image = 1;
                            $has_image = 1;

                            for ($i = 0; $i < $length; $i++) {
                                $new_rand = rand(0, 9);
                                $number .= $new_rand;
                            }

                            //posoting the post

                            $post = new Post();

                            $post->user_email = $request
                                ->session()
                                ->get("user")["email"];

                            $post->post = $request->post;

                            $post->postid = $number;

                            $post->has_image = $has_image;

                            $post->is_profile_image = $is_profile_image;

                            $post->is_cover_image = $is_cover_image;

                            $post->likes = 0;
                            if ($imagename) {
                                $post->image = $imagename;
                                $post->has_image = $has_image;
                            }

                            $post->save();
                        }

                        // Update the session data with the new cover image
                        $user = $request->session()->get("user");
                        $user["cover_image"] = $imagename;
                        $request->session()->put("user", $user);

                        return redirect("/profile");
                    }
                } else {
                    return redirect()
                        ->back()
                        ->withErrors([
                            "size" => "Only size of 3mb or lower is allowed",
                        ]);
                }
            } else {
                return redirect()
                    ->back()
                    ->withErrors([
                        "type" => "Only images of JPEG type are allowed",
                    ]);
            }
        } else {
            return redirect()
                ->back()
                ->withErrors(["empty" => "Please Select any image"]);
        }
    }

    function deletePost($id)
    {
        $post = post::where("postid", $id)->first();
        $post->delete();
        return redirect()->back();
    }

    public function getPost(Request $request)
    {
        $postID = $request->postID;
        $post = Post::where("postid", $postID)->first();
        return response()->json(["postContent" => $post]);
    }

    public function updtatepost(Request $request)
    {
        $postid = $request->postID;
        $post = $request->text;

        $imageName = "";
        $has_image = 0;

        if ($request->hasFile("file")) {
            $image = $request->file("file");
            $imageName = $image->getClientOriginalName();
            $image->move(public_path("photo"), $imageName);
            $has_image = 1;

            DB::table("posts")
                ->where("postid", $postid)
                ->update([
                    "post" => $post,
                    "image" => $imageName,
                ]);

            return redirect()->back();
        } else {
            DB::table("posts")
                ->where("postid", $postid)
                ->update(["post" => $post]);

            return redirect()->back();
        }
    }


    function navbarmenus(Request $request)
    {
        $section = $request->section;

        if ($section == "photos") {
            $email = $request->id;
            $header_image = session()->get("user");
            $user = User::where("email", $email)->first();
            $sidephotos = Post::orderBy("id", "DESC")
                ->where("user_email", $email)
                ->get();

            return view(
                "profile_content_photos",
                compact("user", "header_image", "sidephotos")
            );
        } elseif ($section == "follow") {
            $email = $request->id;
            $type = "user";
            $header_image = session()->get("user");
            $user = User::where("email", $email)->first();
            $sidephotos = Post::orderBy("id", "DESC")
                ->where("user_email", $email)
                ->get();

            $result = Like::where("type", $type)
                ->where("contentid", $email)
                ->first();

            if ($result) {
                $likeresult = json_decode($result->likes, true);

                if (is_array($likeresult)) {
                    $users = [];

                    foreach ($likeresult as $like) {
                        $userResult = User::where(
                            "email",
                            $like["useremail"]
                        )->first();

                        if ($userResult) {
                            $users[] = $userResult;
                        }
                    }

                    return view(
                        "profile_content_followers",
                        compact("users", "user", "header_image", "sidephotos")
                    );
                } else {
                    $email = $request->id;
                    $type = "user";
                    $header_image = session()->get("user");
                    $user = User::where("email", $email)->first();
                    $sidephotos = Post::orderBy("id", "DESC")
                        ->where("user_email", $email)
                        ->get();
                    $users = [];

                    return view(
                        "profile_content_followers",
                        compact("users", "user", "header_image", "sidephotos")
                    );
                    //return "No result found";
                }
            } else {
                $email = $request->id;
                $type = "user";
                $header_image = session()->get("user");
                $user = User::where("email", $email)->first();
                $sidephotos = Post::orderBy("id", "DESC")
                    ->where("user_email", $email)
                    ->get();
                $users = [];

                return view(
                    "profile_content_followers",
                    compact("users", "user", "header_image", "sidephotos")
                );
                // return "No result found";
            }
        } elseif ($section == "following") {
            $email = $request->id;
            $type = "user";
            $header_image = session()->get("user");
            $user = User::where("email", $email)->first();
            $sidephotos = Post::orderBy("id", "DESC")
                ->where("user_email", $email)
                ->get();

            $result = Like::where("type", $type)
                ->where("contentid", $email)
                ->first();

            if ($result) {
                $likeresult = json_decode($result->following, true);

                if (is_array($likeresult)) {
                    $users = [];

                    foreach ($likeresult as $like) {
                        $userResult = user::where(
                            "email",
                            $like["useremail"]
                        )->first();

                        if ($userResult) {
                            $users[] = $userResult;
                        }
                    }

                    return view(
                        "profile_content_following",
                        compact("users", "user", "header_image", "sidephotos")
                    );
                } else {
                    $email = $request->id;
                    $type = "user";
                    $header_image = session()->get("user");
                    $user = User::where("email", $email)->first();
                    $sidephotos = Post::orderBy("id", "DESC")
                        ->where("user_email", $email)
                        ->get();
                    $users = [];

                    return view(
                        "profile_content_following",
                        compact("users", "user", "header_image", "sidephotos")
                    );
                }
            } else {
                $email = $request->id;
                $type = "user";
                $header_image = session()->get("user");
                $user = User::where("email", $email)->first();
                $sidephotos = Post::orderBy("id", "DESC")
                    ->where("user_email", $email)
                    ->get();
                $users = [];

                return view(
                    "profile_content_following",
                    compact("users", "user", "header_image", "sidephotos")
                );
                //return "No result found";
            }
        } elseif ($section =="timeline") {
           
            $type = "user";
            $id = session()->get("user")["email"];
            $result = Like::where("type", $type)
                ->where("contentid", $id)
                ->value("following");

            if ($result) {
                $following = json_decode($result, true);

                if (is_array($following)) {
                    $followrs_ids = array_column($following, "useremail");
                    $follower_ids = implode(",", $followrs_ids);
                }
                if ($follower_ids) {
                    $oldPosts = DB::table("posts")
                        ->where("user_email", $id)
                        ->orWhereIn("user_email", explode(",", $follower_ids))
                        ->orderBy("id", "desc")
                        ->limit(30)
                        ->get();

                        
                    if ($oldPosts) {
                        
                     return view("profile_content_timeline", compact("oldPosts"));
                      
                    }
                }
            }

           
        }

        elseif ($section == "settings") {

            $email = $request->id;
            $header_image = session()->get("user");
            $user = User::where("email", $email)->first();
            

            return view("profile_content_settings", compact("header_image","user"));
           
        }
    }

    function bio(Request $request)
    {
        if ($request->mode == "Save") {
            $bio = [
                "email" => $request->email,
                "designation" => $request->designation,
                "about" => $request->about,
                "city" => $request->city,
            ];

            bio::insert($bio);
        } else {
            $email = $request->email;
            bio::where("email", $email)->update([
                "designation" => $request->designation,
                "about" => $request->about,
                "city" => $request->city,
            ]);
        }

        return redirect()->back();
    }


function settings(Request $request){
$first_name = $request->first_name;
$last_name = $request->last_name;
$gender = $request->gender;
$email = $request->email;
$password = $request->password1;
$password2 = $request->password2;

if (strlen($password)<30) {
    if ($password == $password2) {
            $password = bcrypt($password);
    }
    else{
        unset($password);
        return redirect()->back();
    }
    }
    unset($password2);
    // Update the user record
     DB::table('users')->where('email', $email)->update([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'gender' => $gender,
        'email' => $email,
        'password' => $password, 
        ]);
      return redirect()->back();
}



function search(Request $request){
if (session()->has("user")) {
$find =  $request->find;
$result = DB::table('users')->where('first_name','LIKE','%'.$find.'%')
->orWhere('last_name','LIKE','%'.$find.'%')->limit(10)->get();
return view('search',compact('result'));
}else{
return redirect('/login');
}
}

public function postComment(Request $request, $post_id)
    {

        if (session()->has("user")) {
        $comment = new Comment();
        $comment->name = session()->get("user")["first_name"];
        $comment->comment = $request->input('comment');
        $comment->user_id 	 =  $post_id;
        $comment->save();
        return redirect()->back();
        }
        else{
          return redirect('/login');
        }

    }


 public function addReply(Request $request,$post_id){

    $reply = new Reply();
    $reply->name  = session()->get("user")["first_name"];
    $reply->user_id  =  session()->get("user")["id"];
    $reply->comment_id  = $request->commentId;
    $reply->reply = $request->reply;
    $reply->save();
    return redirect()->back();


 }   




}