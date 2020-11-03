<?php
namespace Site;
class Vehicule
{
    private $id;
    private $nom;
    private $marque;
    private $enLocation;
    private $prix;
    private $image;

   
    public function setMarque($marque)
    {
        $this->marque=$marque;
    }
    
    
    public function getMarque()
    {
        return $this->marque;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->$id = $id;
    }

    public function getEnLocation()
    {
        return $this->enLocation;
    }

    public function setEnLocation($enLocation)
    {
        $this->$enLocation = $enLocation;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->$nom = $nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }
    
    public function setPrix($prix)
    {
        $this->$prix=$prix;
    }

    
    public function getImage()
    {
        return $this->image;
    }
    
    public function setImage($image)
    {
        $this->$image=$image;
    }

    public function __construct($nom,$marque,$enLocation,$prix,$image)
    {
        $this->nom = $nom;
        $this->marque=$marque;  
        $this->enLocation = $enLocation;
        $this->prix = $prix;
        $this->image=$image;
    }
}
?>