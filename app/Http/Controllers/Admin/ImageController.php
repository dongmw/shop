<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ImageController extends Controller
{
    /**
     * 文件上传类
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('Filedata') and $request->file('Filedata')->isValid()) {

            //数据验证
            $allow = array('image/jpeg', 'image/png', 'image/gif');

            $mine = $request->file('Filedata')->getMimeType();
            if (!in_array($mine, $allow)) {
                return ['status' => 0, 'msg' => '文件类型错误，只能上传图片'];
            }

            //文件大小判断$filePath
            $max_size = 1024 * 1024 * 3;
            $size = $request->file('Filedata')->getClientSize();
            if ($size > $max_size) {
                return ['status' => 0, 'msg' => '文件大小不能超过3M'];
            }

            //original图片
            $path = $request->Filedata->store('public/images');

            //绝对路径
            $file_path = storage_path('app/') . $path;

            //生成缩略图
            $this->clip($file_path);

            //保存到七牛
            qiniu_upload($file_path);

            $file_name = basename($path);

            //保存到Images表
            $image = \App\Models\Image::create(['identifier' => $file_name]);

            return ['status' => 1, 'medium' => env('QINIU_LINK') . 'medium_' . $file_name, 'image_id' => $image->id];
        }
    }

    /**
     * 生成缩略图 thumb medium
     * @param $file_path
     */
    private function clip($file_path)
    {
        /**
         * thumb
         */
        $thumb_name = storage_path('app/public/images') . '/thumb_' . basename($file_path);
        $thumb = Image::make($file_path);
        $thumb->resize(config('admin.image.thumb.width'), config('admin.image.thumb.height'));
        $thumb->save($thumb_name);
        qiniu_upload($thumb_name);

        /**
         * medium
         */
        $medium_name = storage_path('app/public/images') . '/medium_' . basename($file_path);
        $medium = Image::make($file_path);
        $medium->resize(config('admin.image.medium.width'), config('admin.image.medium.height'));
        $medium->save($medium_name);
        qiniu_upload($medium_name);
    }

    /**
     * 上传网站ico图标
     * @param Request $request
     * @return array
     */
    public function upload_icon(Request $request)
    {
        if ($request->hasFile('Filedata') and $request->file('Filedata')->isValid()) {
            //取得之前文件的扩展名
            $extension = $request->file('Filedata')->getClientOriginalExtension();
            if ($extension != 'ico') {
                return ['status' => 0, 'msg' => '文件类型错误，只能上传ico格式的图片'];
            }

            //文件大小判断
            $max_size = 1024 * 1024;
            $size = $request->file('Filedata')->getClientSize();
            if ($size > $max_size) {
                return ['status' => 0, 'msg' => '文件大小不能超过1M'];
            }

            //上传文件夹，如果不存在，建立文件夹
            $path = getcwd();

            $file_name = "favicon.ico";
            $request->file('Filedata')->move($path, $file_name);
        }
    }
}
