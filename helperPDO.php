<?php
class driverBD {
private $db;
    /* Constructor que conecta al motor Mysql */
public function __construct() {
        $host = "localhost";
        $dbname = "dbtienda";
        $userdb = "root";
        $passdb = "";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $userdb, $passdb);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->query("SET NAMES 'utf8'");
            $this->db->query("SET lc_time_names = 'es_ES'");
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
        }
    }

    /* Función  que retorna filas (para un listado consulta) */

    public function getQuery($sql) {
        try {
            return $this->db->query($sql);
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }

    public function getProcedure($sql) {
        try {
            return $this->db->prepare($sql);
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }

    public function getView($stmt) {

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }

    public function getCellView($stmt) {

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }

    public function getExecute($stmt) {

        try {

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }
    public function getAutoId($sql, $id) {
        try {

            $cod = '';

            foreach ($this->db->query($sql . " ORDER BY $id DESC LIMIT 0,1") as $row):
                $cod = $row[$id];
            endforeach;

            if ($cod != '' && $cod != null):
                $cod++;
            else:
                $cod = 1;
            endif;

            return $cod;
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }
    public function getRows($stmt) {
        try {
            return $stmt->rowCount();
        } catch (PDOException $e) {
            file_put_contents('PDOErrors.txt', date('d/m/Y H:i:s') . ': ' . $e->getMessage() . chr(13) . chr(10), FILE_APPEND);
            echo $e->getMessage();
        }
    }
}
?>