<?php
class Img
{

private $img;
private $imgtype;

public function getImg()
{
    return $this->img;
}

public function getImgType()
{
    return $this->imgtype;
}

public function setImage($img,$imgtype)
{
    $this->img =$img;
    $this->imgtype = $imgtype;
}

public function getImage()
{
    return $this;
}

}
?>