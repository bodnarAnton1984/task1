<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\MailService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;
use App\Http\Requests\ImageRequest;
use Auth;
use App\ModelImage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function downloadImage()
    {

        if(view()->exists('downloadimage')){

            $user = Auth::user();
            $images_user = '';
            $loadImg = new ModelImage;
            $images_user = $loadImg->getImagesUser($user->id);

            /*
            * view
            **/
            $view = view('downloadimage', [
                'images_user' => $images_user,
            ])->withTitle('Загрузка изображения')
                ->withDescription('Загрузка изображения')
                ->withKeywords('Загрузка изображения')
                ->render();

            return (new Response($view))->header('charset', 'utf-8');

        }
    }

    public function downloadFile(ImageRequest $request)
    {
        $request->flash();

        if($request->isMethod('post')){

            $request->flash();
            $loadImg = new ModelImage;
            $res = $loadImg->loadImage($request);

            return redirect('home/download-image');

        }
    }

}
