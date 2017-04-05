<?php
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;
function qiniu_upload($file_path)
{
    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '11PogNoK4w5aVJqkVfqpc53_H5QOL1pqm_U4sHN5';
    $secretKey = 'vMfkT9pvEKaT4rdzixA--VROgicN2Bai8Sl0QNkH';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
    $bucket = 'hyac';

//    // 生成上传 Token
//    $token = $auth->uploadToken($bucket);
//
//    // 要上传文件的本地路径
//    $filePath =getcwd() .  '/storage' . ltrim($path, 'public');
//
//    // 上传到七牛后保存的文件名
//    $key = basename($path);
//
//    // 初始化 UploadManager 对象并进行文件的上传
//    $uploadMgr = new UploadManager();
//
//    // 调用 UploadManager 的 putFile 方法进行文件的上传
//    return $uploadMgr->putFile($token, $key, $path);

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);

    // 上传到七牛后保存的文件名
    $key = basename($file_path);

    // 初始化 UploadManager 对象并进行文件的上传
    $uploadMgr = new UploadManager();

    // 调用 UploadManager 的 putFile 方法进行文件的上传
    $uploadMgr->putFile($token, $key, $file_path);

    unlink($file_path);
}