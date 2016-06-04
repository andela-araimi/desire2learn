<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Desire2Learn\View;
use Desire2Learn\Like;
use Desire2Learn\Video;
use Desire2Learn\Comment;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Repository\VideoRepository;

class VideoController extends Controller
{
    public function uploadVideo()
    {
    	$categories = Category::all();
    	return view('dashboard.video.uploadform', compact('categories'));
    }

    public function getYouTubeIdFromURL($url)
    {
        $videoId = substr($url, 32, 11);

        return $this->checkyoutubeUrlExist($videoId);
    }

    /**
     * Validate the existence of a resource video.
     *
     * @param $url 
     *
     * @return bool
     */
    protected function checkyoutubeUrlExist($videoId)
    {
        $url = "https://www.youtube.com/watch?v=$videoId";
        $headers = get_headers($url);

        return ($headers[0] !== 'HTTP/1.0 404 Not Found') ? true : false;
    }


    public function postVideo(Request $request)
    {
    	$this->validate($request, [
            'title'       => 'required',
            'url'          => 'required|url',
            'category'    => 'required',
            'description' => 'required',
        ]);

        if (strlen($request['url']) < 32) {
            alert()->error('Please provide a valid youtube url length', 'error');
            
            return redirect()->back();
        }

        $video = Video::where('category', $request['category'])->where('url', substr($request['url'], 32, 11))->get();

        if ($video->count() > 0) {
            alert()->error('The video already exist in this category', 'error');

            return redirect()->back();
        }

        $url = $this->getYouTubeIdFromURL($request['url']);

        if ($url) {
            return $this->createVideo($request);
        }

        alert()->error('Invalid youtube url', 'error');

        return redirect()->back();
    }

    public function createVideo($request)
    {
        $videoUpload = Video::create([
            'title'       => $request['title'],
            'user_id'     => auth()->user()->id,
            'url'         => substr($request['url'], 32, 11),
            'category'    => $request['category'],
            'description' => $request['description'],
        ]);

            if (is_null($videoUpload->id)) {
                alert()->error('Video upload failed', 'error');

                return redirect()->back();
            }

            alert()->success('Video uploaded successfully', 'success');

            return redirect()->route('uploaded.video'); 
    }

    public function postView($id, $video)
    {
        if (Auth::check()) {
            $addView = View::create([
                'user_id'  => auth()->user()->id,
                'video_id' => $video->id,
            ]);
        }
    }

    public function showVideo($id)
    {
        $video = Video::find($id);

        if (is_null($video)) {
            alert()->error('Oops! The video is not available!');

            return redirect()->route('index');  
        }

        $like  = $video->likes->where('like', 1);
        $unlike = $video->likes->where('like', 0);

        $relatedVideos = Video::where('category', $video->category)->get();

        $video->increment('views');

        $this->postView($id, $video);

        $latestComments = $video->comments()->latest()->take(10)->get();

        return view('layout.video.showvideo', compact('video', 'like', 'unlike', 'latestComments', 'relatedVideos'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Auth::user()->videos->find($id);
        $categories = Category::all();

        if (is_null($video)) {
            alert()->error('Oops! unauthorize because you are not the owner!');
            return redirect()->route('dashboard.home');  
        }
        
        return view('dashboard.video.editvideo', compact('video', 'categories'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'url'         => 'required|url|unique:videos,url,'.$request->id,
            'category'    => 'required',
            'description' => 'required',
        ]);

        $videos = Video::where('id', $request->id)->update([
            'title'       => $request->title,
            'url'         => $this->getYouTubeIdFromURL($request['url']),
            'category'    => $request->category,
            'description' => $request->description,
        ]);
        
        if ($videos) {
            alert()->success('Video updated succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
            alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }

     /**
     * This method delete videos created 
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Auth::user()->videos->find($id);

        if (is_null($video)) {
            alert()->error('Oops! unauthorize because you are not the owner!');

            return redirect()->route('dashboard.home');
        }

        $videoDelete = $video->delete();

        if ($videoDelete) {
            alert()->success('Video deleted succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
           alert()->error('Something went wrong', 'error');

            return redirect()->route('dashboard.home');
        }
    }
}
