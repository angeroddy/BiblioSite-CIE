<?php
class Membre
{
    // Connection
    private $conn;
    // Table
    private $db_table = "membre";
    // Columns
    public $id_membre;
    public $nom_membre;
    public $prenom_membre;
    public $date_inscription;
    public $dateNaiss_membre;
    public $contacts;
    public $email;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //REDIRECT
    public function redirect($url)
    {
        header("Location: $url");
    }
    // GET ALL
    public function getMembers()
    {
        $sqlQuery = "SELECT id_membre, nom_membre, prenom_membre, date_inscription , dateNaiss_membre, contacts FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    function getOneMumber($id_membre)
    {
        $sqlQuery = "SELECT *FROM membre WHERE id_membre ='$id_membre'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createMembers($nom_membre, $prenom_membre, $date_inscription, $dateNaiss_membre, $contacts, $email)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->db_table . "(nom_membre,prenom_membre, date_inscription , dateNaiss_membre, contacts,email) VALUES(:unom, :uprenom,:udateinscript,:udatenaiss,:ucontact,:uemail)");
            $stmt->bindparam(":unom", $nom_membre);
            $stmt->bindparam(":uprenom", $prenom_membre);
            $stmt->bindparam(":udateinscript", $date_inscription);
            $stmt->bindparam(":udatenaiss", $dateNaiss_membre);
            $stmt->bindparam(":ucontact", $contacts);
            $stmt->bindparam(":uemail", $contacts);
            $stmt->bindparam(":uemail",$email);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
        }
    }
    // READ single
    public function getSingleMember()
    {
        $sqlQuery = "SELECT
                        id, 
                        nom_membre, 
                        prenom_membre, 
                        date_inscription, 
                        dateNaiss_membre, 
                        contacts
                        email
                      FROM
                        " . $this->db_table . "
                    WHERE 
                       id = ?
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nom_membre = $dataRow['nom_membre'];
        $this->prenom_membre = $dataRow['prenom_membre'];
        $this->date_inscription = $dataRow['date_inscription'];
        $this->dateNaiss_membre = $dataRow['dateNaiss_membre'];
        $this->contacts = $dataRow['contacts'];
        $this->email = $dataRow['email'];
    }
    // UPDATE
    public function updateMembers($id_membre,$nom_membre, $prenom_membre, $date_inscription, $dateNaiss_membre, $contacts, $email)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE membre SET nom_membre = :unom, prenom_membre = :uprenom, date_inscription = :uinscript,dateNaiss_membre = :udatenaiss, contacts = :ucontact, email = :uemail WHERE id_membre = :uid_membre");
            $stmt->bindparam(":unom", $nom_membre);
            $stmt->bindparam(":uprenom", $prenom_membre);
            $stmt->bindparam(":uinscript", $date_inscription);
            $stmt->bindparam(":udatenaiss", $dateNaiss_membre);
            $stmt->bindparam(":ucontact", $contacts);
            $stmt->bindparam(":uemail", $email);
            $stmt->bindparam(":uid_membre",$id_membre);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // DELETE
    function deleteMembers($id_membre)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM membre WHERE id_membre = :id");
            $stmt->bindparam(":id", $id_membre);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function login($login, $password)
    {
        $sqlQuery = "SELECT *FROM compte WHERE login = '$login'AND mot_de_passe ='$password'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        if ($stock = $stmt->fetch()) {
            header("Location:dashboard.php");
        }
    }

    function count()
    {
        $sqlQuery = "SELECT COUNT(*) FROM membre";
        $stmt = $this->conn->prepare($sqlQuery);
        $count = $stmt->fetchColumn();
        print $count;
    }
}
