<?php
namespace Site;
class Vehicule
{
    private $id;
    private $nom;
    private $enLocation;
    private $retard;
    private $nbrejretard;
    private $datedeb;
    private $datefin;
    private $prix;
    private $image;
    private $idClient;

    
    public function getIdVehicule()
    {
        return $this->id;
    }

    public function setIdVehicule($id)
    {
        $this->$id = $id;
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

    public function getRetard()
    {
        return $this->retard;
    }

    public function setNrJRetard($nbrejretard)
    {   
    $this->$nbrejretard = $nbrejretard;
    }

    
    public function getNrJRetard()
    {
        return $this->nbrejretard;
    }

    public function setRetard($retard)
    {   
    $this->$retard = $retard;
    }

    public function getDateDeb()
    {
        return $this->datedeb;
    }
    
    public function setDateDeb($datedeb)
    {
        $this->$datedeb=$datedeb;
    }

    
    public function getDateFin()
    {
        return $this->datefin;
    }
    
    public function setDateFin($datefin)
    {
        $this->$datefin=$datefin;
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

    public function __construct($nom,$enLocation,$retard,$nbrejretard,$datedeb,$datefin,$prix,$image,$idClient)
    {
        $this->nom = $nom;
        $this->enLocation = $enLocation;
        $this->retard = $retard;
        $this->datedeb = $datedeb;
        $this->nbrejretard = $nbrejretard;
        $this->datefin = $datefin;
        $this->prix = $prix;
        $this->image=$image;
        $this->idClient=$idClient;
    }
}
?>