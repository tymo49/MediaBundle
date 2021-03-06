<?php

namespace AppVerk\MediaBundle\Doctrine;

use AppVerk\MediaBundle\Entity\Media;
use AppVerk\Components\Doctrine\AbstractManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaManager extends AbstractManager implements MediaManagerInterface
{
    public function createMedia(UploadedFile $uploadedFile, string $fileName)
    {
        /** @var Media $media */
        $media = new $this->className();
        $media->setName($uploadedFile->getClientOriginalName());
        $media->setFileName($fileName);
        $media->setSize($uploadedFile->getClientSize());
        $media->setMimeType($uploadedFile->getClientMimeType());

        $this->persistAndFlash($media);

        return $media;
    }
}
