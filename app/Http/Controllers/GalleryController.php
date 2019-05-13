<?php
namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('/');
        return view('gallery.index', ['files' => $files]);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
      $file = $request->file('file');
      // 第一引数はディレクトリの指定
      // 第二引数はファイル
      // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
      $path = Storage::disk('s3')->putFile('/', $file, 'public');
      // hogeディレクトリにアップロード
      // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
      // ファイル名を指定する場合はputFileAsを利用する
      // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
      return redirect('/');
    }


    public function show($filename)
    {
        $disk = Storage::disk('s3');
        try {
            $contents = $disk->get($filename);
            $mimeType = $disk->mimeType($filename);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 404);
        }
        return response($contents)->header('Content-Type', $mimeType);
    }

    public function destroy($filename)
    {
        $disk = Storage::disk('s3');
        $disk->delete($filename);
        return redirect()->action('GalleryController@index');
    }
}
