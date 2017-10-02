<?php

require __DIR__ . '/db.php';

class Driver
{
    protected $db;

    //Driver constructor.
    public function __construct()
    {
        $this->db = DB();
    }

    /*
    * Add new Driver
    *
    * @param $Dname
    * @param $Dbirth
    * @param $Dcpf
    * @param $Dcar
    * @param $Dstatus
    * @param $Dgender
    *
    * @return string
    */
    public function Create($Dname, $Dbirth, $Dcpf, $Dcar, $Dstatus, $Dgender)
    {
        $queryCPF = $this->db->prepare("SELECT * FROM drivers WHERE cpfD = :sqlCpf;");
        $queryCPF->bindParam("sqlCpf", $Dcpf, PDO::PARAM_STR);
        $queryCPF->execute();
        $row = $queryCPF->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            http_response_code(400);
        }

        $query = $this->db->prepare("INSERT INTO drivers (nameD, birthD, cpfD, carD, statusD, genderD) VALUES (:sqlName, :sqlBirth, :sqlCpf, :sqlCar, :sqlStatus, :sqlGender)");
        $query->bindParam("sqlName", $Dname, PDO::PARAM_STR);
        $query->bindParam("sqlBirth", $Dbirth, PDO::PARAM_STR);
        $query->bindParam("sqlCpf", $Dcpf, PDO::PARAM_STR);
        $query->bindParam("sqlCar", $Dcar, PDO::PARAM_STR);
        $query->bindParam("sqlStatus", $Dstatus, PDO::PARAM_STR);
        $query->bindParam("sqlGender", $Dgender, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['driver' => [
            'nameD' => $Dname,
            'birthD' => $Dbirth,
            'cpfD' => $Dcpf,
            'carD' => $Dcar,
            'statusD' => $Dstatus,
            'genderD' => $Dgender
        ]]);
        http_response_code(200);
    }

    /**
     * List Drivers
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM drivers ORDER BY nameD");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['driversRead' => $data]);
        http_response_code(200);
    }

    /**
     * Update Driver
     *
     * @param $Dname
     * @param $Dbirth
     * @param $Dcpf
     * @param $Dcar
     * @param $Dstatus
     * @param $Dgender
     *
     */
    public function Update($Dname, $Dbirth, $Dcpf, $Dcar, $Dstatus, $Dgender)
    {

        $query = $this->db->prepare("UPDATE drivers SET nameD = :sqlName, birthD = :sqlBirth, carD = :sqlCar, statusD = :sqlStatus, genderD = :sqlGender WHERE cpfD = :sqlCpf");
        $query->bindParam("sqlName", $Dname, PDO::PARAM_STR);
        $query->bindParam("sqlBirth", $Dbirth, PDO::PARAM_STR);
        $query->bindParam("sqlCpf", $Dcpf, PDO::PARAM_STR);
        $query->bindParam("sqlCar", $Dcar, PDO::PARAM_STR);
        $query->bindParam("sqlStatus", $Dstatus, PDO::PARAM_STR);
        $query->bindParam("sqlGender", $Dgender, PDO::PARAM_STR);
        $query->execute();

        http_response_code(200);
    }

    /**
     * Delete Driver
     *
     * @param $Dcpf
     */
    public function Delete($Dcpf)
    {
        $query = $this->db->prepare("DELETE FROM drivers WHERE cpfD = :sqlCpf;");
        $query->bindParam("sqlCpf", $Dcpf, PDO::PARAM_STR);
        $query->execute();
        http_response_code(200);
    }
}

class Passenger
{
    protected $db;

    /**
     * Passenger constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /**
     * Add new Passenger
     *
     * @param $Pname
     * @param $Pbirth
     * @param $Pcpf
     * @param $Pgender
     *
     * @return string
     */
    public function Create($Pname, $Pbirth, $Pcpf, $Pgender)
    {
        $query = $this->db->prepare("INSERT INTO passengers (nameP, birthP, cpfP, genderP) VALUES (:sqlName, :sqlBirth, :sqlCpf, :sqlGender)");
        $query->bindParam("sqlName", $Pname, PDO::PARAM_STR);
        $query->bindParam("sqlBirth", $Pbirth, PDO::PARAM_STR);
        $query->bindParam("sqlCpf", $Pcpf, PDO::PARAM_STR);
        $query->bindParam("sqlGender", $Pgender, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['passenger' => [
            'nameP' => $Pname,
            'birthP' => $Pbirth,
            'cpfP' => $Pcpf,
            'genderP' => $Pgender
        ]]);
    }

    /**
     * List Passengers
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM passengers ORDER BY nameP, cpfP");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['passengersRead' => $data]);
    }

    /**
     * Update Passenger
     *
     * @param $Pname
     * @param $Pbirth
     * @param $Pcpf
     * @param $Pgender
     *
     */
    public function Update($Pname, $Pbirth, $Pcpf, $Pgender)
    {
        $query = $this->db->prepare("UPDATE passengers SET nameP = :sqlName, birthP = :sqlBirth, genderP = :sqlGender WHERE cpfP = :sqlCpf");
        $query->bindParam("sqlName", $Pname, PDO::PARAM_STR);
        $query->bindParam("sqlBirth", $Pbirth, PDO::PARAM_STR);
        $query->bindParam("sqlCpf", $Pcpf, PDO::PARAM_STR);
        $query->bindParam("sqlGender", $Pgender, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Passenger
     *
     * @param $Pcpf
     */
    public function Delete($Pcpf)
    {
        $query = $this->db->prepare("DELETE FROM passengers WHERE cpfP = :sqlCpf");
        $query->bindParam("sqlCpf", $Pcpf, PDO::PARAM_STR);
        $query->execute();
    }
}

class Ride
{
    protected $db;

    /**
     * Ride constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /*
    * Add new Ride
    *
    * @param $driv
    * @param $pass
    * @param $cost
    *
    * @return string
    */
    public function Create($cpfDriv, $nameDriv, $cpfPass, $namePass, $cost)
    {
        $query = $this->db->prepare("INSERT INTO rides (cost, cpfDriver, nameDriver, cpfPassenger, namePassenger) VALUES (:sqlCost, :sqlCpfDriver, :sqlNameDriver, :sqlCpfPassenger, :sqlNamePassenger)");
        $query->bindParam("sqlCpfDriver", $cpfDriv, PDO::PARAM_STR);
        $query->bindParam("sqlNameDriver", $nameDriv, PDO::PARAM_STR);
        $query->bindParam("sqlCpfPassenger", $cpfPass, PDO::PARAM_STR);
        $query->bindParam("sqlNamePassenger", $namePass, PDO::PARAM_STR);
        $query->bindParam("sqlCost", $cost, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['ride' => [
            'id' => $this->db->lastInsertId(),
            'cpfDriver' => $cpfDriv,
            'nameDriver' => $nameDriv,
            'cpfPassenger' => $cpfPass,
            'namePassenger' => $namePass,
            'cost' => $cost
        ]]);
        http_response_code(200);
    }

    /**
     * List Rides
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM rides ORDER BY id");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return json_encode(['ridesRead' => $data]);
    }

    /*
    * Delete Rides
    *
    * @param $idRide
    */
    public function Delete($idRide)
    {
        $query = $this->db->prepare("DELETE FROM rides WHERE id = :id");
        $query->bindParam("id", $idRide, PDO::PARAM_STR);
        $query->execute();
    }
}
