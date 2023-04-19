<?php

namespace Core;

use \PDO;

class Model
{
    protected $table;
    public $id;
    public static $pdo;
    public static function connexion()
    {
        $bd = "memory";
        $login = "root";
        $mdp = "";
        $pdo = new PDO("mysql:host=localhost;dbname=" . $bd, $login, $mdp);
        $pdo->exec('SET NAMES utf8');
        return  $pdo;
    }

    static function deconnexion()
    {
        $pdo = null;
    }



    public function update($pdo, $data)
    {
        $sql = "UPDATE $this->table SET ";
        foreach ($data as $k => $v) {
            if ($k != "id") {
                $sql .= "$k='$v',";
            }
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE " . $this->id . "='" . $data['id'] . "'";
        //var_dump($sql);
        $requete = $pdo->prepare($sql);
        if ($requete->execute()) return true;
        else return false;
    }

    public function insert($pdo, $data)
    {
        $sql = "INSERT INTO $this->table (";
        foreach ($data as $k => $v) {

            $sql .= "$k,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES(";
        foreach ($data as $k => $v) {

            $sql .= '' . $v . ',';
        }
        $sql = substr($sql, 0, -1);
        $sql .= ")";
        //var_dump($sql);
        $requete = $pdo->prepare($sql);

        if ($requete->execute()) return true;
        else return false;
    }
    public function delete($pdo, $data)
    {
        $sql = "DELETE FROM $this->table";
        $sql .= " WHERE " . $this->id . "='" . $data['id'] . "'";
        // var_dump($sql);
        $requete = $pdo->prepare($sql);
        if ($requete->execute()) return true;
        else return false;
    }
    public function find($pdo, $data = array())
    {
        $condition = "1=1";
        $champs = "*";
        $limit = "";
        $order = "";
        $join = "";

        if (isset($data['condition'])) {
            $condition = $data['condition'];
        }
        if (isset($data['champs'])) {
            $champs = $data['champs'];
        }
        if (isset($data['limit'])) {
            $limit = "LIMIT " . $data['limit'];
        }
        if (isset($data['order'])) {
            $order = "ORDER BY " . $data['order'];
        }
        if (isset($data['join'])) {
            $join = $data['join'];
        }

        $sql = "SELECT $champs FROM $this->table $join WHERE $condition  $order $limit";
        //var_dump($sql);
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_OBJ);
        return $resultats;
    }

    public static function load($name)
    {
        require_once(ROOT . 'model/' . ucfirst($name) . '.php');
        $monObjet = ucfirst($name);
        return new $monObjet();
    }
}
