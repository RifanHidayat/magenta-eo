<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require '/path/to/vendor/autoload.php';
// use Aws\S3\S3Client;
// use Aws\Exception\AwsException;

require './vendor/autoload.php';

use Aws\S3\S3Client;



class Aws3
{
    private $S3;

    public function __construct()
    {

        $this->S3 = S3Client::factory([

            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => array(
                'key' => 'AKIASH455CBH5F4Z2LUQ',
                'secret' => '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',
            )

        ]);
    }
    function sendFile($bucketName, $filename, $path)
    {

        $result = $this->S3->putObject(array(
            "Bucket" => $bucketName,
            'Key' => $path,
            'SourceFile' => $filename['tmp_name'],
            'ContentType'=>'image/png',
            'StorageClass' => 'STANDARD',
            'ACL' => 'public-read',
        ));
        return $result["ObjectURL"];
    }
}
