<?php

function ensureGalleryDir($tenant, $filename)
{
    $directory = sprintf("tenants/%s/gallery/img/%s/", $tenant, $filename);
    if (!file_exists(getBasePath($directory))) {
        mkdir(getBasePath($directory), 0775);
        $command = sprintf("chmod 775 %s", getBasePath($directory));
        exec($command, $output);
    }
    return $directory;
}

function saveOrigFile()
{
    return (configValue("Gallery", "saveOrigFile") == 'true');
}

function saveInGallery($file, $format, $tenant)
{
    $filename = basename($file, '.svg');
    $thumb = $filename . "_thumb.jpg";

    $directory = ensureGalleryDir($tenant, $filename);

    $command = sprintf(
        "convert %s -background white -flatten -resize 800x800 -quality 75 %s",
        getBasePath('tmp/' . basename($file, 'svg') . 'jpg'),
        getBasePath($directory . $thumb)
    );
    exec($command);

    $info = array(
      "user"=>getUser(),
      'date' => date("Y-m-d H:i:s"),
      'ID' => $filename
    );

    if (saveOrigFile() == true) {
        $origFilename = $filename . "." . $format;
        copy(getBasePath('tmp/' . $origFilename), getBasePath($directory . $origFilename));
        $info['origFile'] = $origFilename;
    }
    file_put_contents(getBasePath($directory . 'info.json'), json_encode($info));
}

function saveWorkInGallery($zipfile, $tenant, $filename)
{
    $directory = ensureGalleryDir($tenant, $filename);
    $targetFile = getBasePath($directory . "save_" . $filename . ".zip");
    copy($zipfile, $targetFile);
}

function showImages($dir_glob)
{
    $dirs = array_reverse(glob($dir_glob, GLOB_ONLYDIR));
    $i=0;
    foreach ($dirs as $shpic) {
        showImage($shpic);
        $i++;
    }
}

function showImage($shpic)
{
    $thumb = $shpic . '/' . basename($shpic) . '_thumb.jpg';
    $infofile = $shpic . '/info.json';

    if (file_exists($infofile)) {
        $info = json_decode(file_get_contents($infofile), true);
    }
    $id = $info['ID'];
    $user = $info['user'];
    $date = $info['date'];

    $origLink='';
    if (isset($info['origFile'])) {
        $origFilePath = $shpic . '/' . $info['origFile'];
    }

    $saveLink='';
    $saveFile = $shpic . '/save_' . basename($shpic) . '.zip';

    if (file_exists($saveFile)) {
        $useLink = sprintf(
            '<tr> 
                <td class="pe-3"></td>
                <td><a href="index.php?useSavework=%s">
                    <i class="fas fa-wrench"></i> weiterarbeiten
                </a></td>
            </tr>',
            $saveFile
        );
    }

    $deleteLink = '';
    if ($user == $_SESSION['user'] || isAdmin()) {
        $deleteLink = "<tr><td class=\"pe-3\"></td><td><a data-id=\""
        .$id .
        "\" class=\"deleteWorkfile text-danger cursor-pointer\"><i class='fas fa-trash'></i> löschen</a></td></tr>";
    }

    echo <<<EOL
    <div class="col-6 col-md-3 col-lg-3">
        <figure class="samplesharepic">
            <img src="$thumb" class="img-fluid"/>

            <figcaption class="d-flex justify-content-around align-items-center">
                <table class="small m-2">
                    <tr>
                        <td class="pe-3 ">Id</td>
                        <td>$id</td>
                    </tr>
                    <tr>
                        <td class="pe-3 ">Nutzer*in</td>
                        <td>$user</td>
                    </tr>
                    $deleteLink
                    $useLink
                </table>
            </figcaption> 
        </figure>
    </div>
EOL;
}

function deleteWorkfile($id)
{
    $galleryDir = getBasePath('tenants/' . $_SESSION['tenant'] . '/gallery/img/' . $id);
    if (!isAdmin() && !$userOfGalleryFile = getUserOfGalleryFile($galleryDir)) {
        returnJsonErrorAndDie("could not delete");
    }

    if (!isAdmin() && getUser() != $userOfGalleryFile) {
        returnJsonErrorAndDie("could not delete");
    }

    exec('rm -rf ' . $galleryDir);
    returnJsonSuccessAndDie();
}

function getUserOfGalleryFile($dir)
{
    
    $dataFile = $dir . '/info.json';
    if (!file_exists($dataFile)) {
        return false;
    }
    $data = json_decode(file_get_contents($dataFile));

    return $data->user;
}

function countGalleryImages($dir_glob)
{
    $dirs = array_reverse(glob($dir_glob, GLOB_ONLYDIR));
    $ownFiles = 0;
    foreach ($dirs as $shpic) {
        if (getUser()==getUserOfGalleryFile($shpic)) {
            $ownFiles++;
        }
    }

    return array(count($dirs),$ownFiles);
}
