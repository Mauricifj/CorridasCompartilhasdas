<?php

require __DIR__ . '/db.php';

class Driver
{
    protected $db;

    /**
     * Driver constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /**
     * Add new Driver
     *
     * @param $nameDriver
     * @param $birthDriver
     * @param $cpfDriver
     * @param $carDriver
     * @param $statusDriver
     * @param $genderDriver
     *
     * @return string
     */
    public function Create($nameDriver, $birthDriver, $cpfDriver, $carDriver, $statusDriver, $genderDriver)
    {
        $query = $this->db->prepare("INSERT INTO Drivers (nameDriver, birthDriver, cpfDriver, carDriver, statusDriver, genderDriver) VALUES (:name, :birth, :cpf, :car, :status, :gender)");
        $query->bindParam("name", $nameDriver, PDO::PARAM_STR);
        $query->bindParam("birth", $birthDriver, PDO::PARAM_STR);
        $query->bindParam("cpf", $cpfDriver, PDO::PARAM_STR);
        $query->bindParam("car", $carDriver, PDO::PARAM_STR);
        $query->bindParam("status", $statusDriver, PDO::PARAM_STR);
        $query->bindParam("gender", $genderDriver, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['driver' => [
            'id'        => $this->db->lastInsertId(),
            'name'      => $nameDriver,
            'birth'     => $birthDriver,
            'cpf'       => $cpfDriver,
            'car'       => $carDriver,
            'status'    => $statusDriver,
            'gender'    => $genderDriver
        ]]);
    }

    /**
     * List Drivers
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM Drivers");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['drivers' => $data]);
    }


    /**
     * Update Driver
     *
     * @param $idDriver
     * @param $nameDriver
     * @param $birthDriver
     * @param $cpfDriver
     * @param $carDriver
     * @param $statusDriver
     * @param $genderDriver
     *
     */
    public function Update($idDriver, $nameDriver, $birthDriver, $cpfDriver, $carDriver, $statusDriver, $genderDriver)
    {
        $query = $this->db->prepare("UPDATE Drivers SET nameDriver = :name, birthDriver = :birth, cpfDriver = :cpf, carDriver = :car, statusDriver = :status, genderDriver = :gender WHERE idDriver = :id");
        $query->bindParam("id", $idDriver, PDO::PARAM_STR);
        $query->bindParam("name", $nameDriver, PDO::PARAM_STR);
        $query->bindParam("birth", $birthDriver, PDO::PARAM_STR);
        $query->bindParam("cpf", $cpfDriver, PDO::PARAM_STR);
        $query->bindParam("car", $carDriver, PDO::PARAM_STR);
        $query->bindParam("status", $statusDriver, PDO::PARAM_STR);
        $query->bindParam("gender", $genderDriver, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Driver
     *
     * @param $idDriver
     */
    public function Delete($idDriver)
    {
        $query = $this->db->prepare("DELETE FROM Drivers WHERE idDriver = :id");
        $query->bindParam("id", $idDriver, PDO::PARAM_STR);
        $query->execute();
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
     * @param $namePassenger
     * @param $birthPassenger
     * @param $cpfPassenger
     * @param $genderPassenger
     *
     * @return string
     */
    public function Create($namePassenger, $birthPassenger, $cpfPassenger, $genderPassenger)
    {
        //$birthPassenger = strtotime($birthPassenger);
        //$birthPassenger = date('Y-m-d', $birthPassenger);

        $query = $this->db->prepare("INSERT INTO Passengers (namePassenger, birthPassenger, cpfPassenger, genderPassenger) VALUES (:name, :birth, :cpf, :gender)");
        $query->bindParam("name", $namePassenger, PDO::PARAM_STR);
        $query->bindParam("birth", $birthPassenger, PDO::PARAM_STR);
        $query->bindParam("cpf", $cpfPassenger, PDO::PARAM_STR);
        $query->bindParam("gender", $genderPassenger, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['passenger' => [
            'id'        => $this->db->lastInsertId(),
            'name'      => $namePassenger,
            'birth'     => $birthPassenger,
            'cpf'       => $cpfPassenger,
            'gender'    => $genderPassenger
        ]]);
    }

    /**
     * List Passengers
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM Passengers");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['passengers' => $data]);
    }


    /**
     * Update Passenger
     *
     * @param $idPassenger
     * @param $namePassenger
     * @param $birthPassenger
     * @param $cpfPassenger
     * @param $genderPassenger
     *
     */
    public function Update($idPassenger, $namePassenger, $birthPassenger, $cpfPassenger, $genderPassenger)
    {
        $query = $this->db->prepare("UPDATE Passengers SET namePassenger = :name, birthPassenger = :birth, cpfPassenger = :cpf, genderPassenger = :gender WHERE idPassenger = :id");
        $query->bindParam("id", $idPassenger, PDO::PARAM_STR);
        $query->bindParam("name", $namePassenger, PDO::PARAM_STR);
        $query->bindParam("birth", $birthPassenger, PDO::PARAM_STR);
        $query->bindParam("cpf", $cpfPassenger, PDO::PARAM_STR);
        $query->bindParam("gender", $genderPassenger, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Passenger
     *
     * @param $idPassenger
     */
    public function Delete($idPassenger)
    {
        $query = $this->db->prepare("DELETE FROM Passengers WHERE idPassenger = :id");
        $query->bindParam("id", $idPassenger, PDO::PARAM_STR);
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

    /**
     * Add new Ride
     *
     * @param $idRide
     * @param $idDriver
     * @param $idPassenger
     * @param $rideCostCents
     *
     * @return string
     */
    public function Create($idRide, $idDriver, $idPassenger, $rideCostCents)
    {
        $rideCostCents *= 100;

        $query = $this->db->prepare("INSERT INTO Rides (idDriver, idPassenger, rideCostCents) VALUES (:driver, :passenger, :cost)");
        $query->bindParam("driver", $idDriver, PDO::PARAM_STR);
        $query->bindParam("passenger", $idPassenger, PDO::PARAM_STR);
        $query->bindParam("cost", $rideCostCents, PDO::PARAM_STR);
        $query->execute();

        $rideCostCents /= 100;

        return json_encode(['passanger' => [
            'id'        => $this->db->lastInsertId(),
            'driver'      => $idDriver,
            'passenger'     => $idPassenger,
            'cost'       => $rideCostCents
        ]]);
    }

    /**
     * List Rides
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM Rides");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['rides' => $data]);
    }


    /**
     * Update Rides
     *
     * @param $idRides
     * @param $idDriver
     * @param $idPassanger
     * @param $rideCostCents
     */
    public function Update($idRides, $idDriver, $idPassanger, $rideCostCents)
    {
        $query = $this->db->prepare("UPDATE Rides SET idDriver = :driver, idPassenger = :passenger, rideCostCents = :cost WHERE idRide = :id");
        $query->bindParam("driver", $idDriver, PDO::PARAM_STR);
        $query->bindParam("passenger", $idPassanger, PDO::PARAM_STR);
        $query->bindParam("cost", $rideCostCents, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Rides
     *
     * @param $idRides
     */
    public function Delete($idRides)
    {
        $query = $this->db->prepare("DELETE FROM Rides WHERE idRide = :id");
        $query->bindParam("id", $idRides, PDO::PARAM_STR);
        $query->execute();
    }
}
