<?php

//REMEMBER TO get the userid from the cookie
//pro or normal user?
//REMEMBER TO encrypt the files


if ( $_FILES['fileToUpload'] && isset($_FILES['fileToUpload'])){

    if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {

//        header("Location: ../views/uploadFileForm.php");
        die("Upload failed with error " . $_FILES['fileToUpload']['error']);

    }
    else{

        $fileName = $_FILES['fileToUpload']['name'];

        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];

        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);

        $fileType = finfo_file($fileInfo, $_FILES['fileToUpload']['tmp_name']);

        $fileIsOk = false;

        switch ($fileType){
            case 'image/jpeg':
            case 'image/jpg':
            case 'image/png':
            case 'image/x-icon':
            case 'image/gif':
            case 'image/tiff':
            case 'image/bmp':
            case 'audio/basic':
            case 'audio/mp4':
            case 'video/mpeg':
            case 'video/3gpp':
            case 'video/mp4':
            case 'video/3gpp2':
            case 'video/H261':
            case 'video/H263':
            case 'video/H264':
            case 'video/H265':
            case 'video/MPV':
            case 'video/ogg':
            case 'video/quicktime':
            case 'text/plain':
            case 'application/pdf':
            case 'application/zip':
                $fileIsOk = true;
//                die("file accepted");
                break;
            default:
                $fileIsOk = false;
                echo "we don't accept <br>".$fileType;
                break;

        }

        if (filesize($fileTmpName) <= 0){
            $fileIsOk = false;
        }
//        $fileIsOk = false;

        if ($fileIsOk){

            include_once "../functions/userIdGenerator.php";
            include_once "../functions/addFileInfoDatabase.php";

            $fileNewName = generateRandomString();
            $fileNewAddress = "C:/xampp/htdocs/ws/files/".$fileNewName;
            rename($fileTmpName, $fileNewAddress);



        }



    }

}else
{
    die("Something went wrong! Please try again!");
}



?>
