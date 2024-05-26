<?php

class VolunteerDAO {
    public function getAll($username) {
        $volAllSess = [];
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $sql = "select * from volunteer where username=:username";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $volAllSess[] = new Volunteer($row["username"], $row["vname"], $row["vdate"]);
        }
        return $volAllSess;
    }

    // Create new volunteer entry
    public function newEntry($username, $vname, $vdate) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $sql = "INSERT INTO volunteer (username, vname, vdate) VALUES (:username, :vname, :vdate)";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':vname', $vname);
        $stmt->bindParam(':vdate', $vdate);

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $username ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }

        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    // Read volunteer entry
    public function getVolunteerSess($username, $vname, $vdate) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $query = "SELECT * FROM volunteer WHERE Username = :username AND Vname = :vname AND Vdate = :vdate LIMIT 0,1";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':vname', $vname);
        $stmt->bindParam(':vdate', $vdate);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $stmt->execute() ) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $volunteer = new Volunteer($row["username"], $row["vname"], $row["vdate"]);
            }
            
        }
        else {
            $connMgr->handleError( $stmt, $query );
        }
        $stmt = null;
        $conn = null;  

        return $volunteer;
    }

    public function checkSess($username, $vname, $vdate) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $query = "SELECT * FROM volunteer WHERE Username = :username AND Vname = :vname AND Vdate = :vdate LIMIT 0,1";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':vname', $vname);
        $stmt->bindParam(':vdate', $vdate);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // If a row is found, the user has already signed up for the event and date
        return !empty($result);
    }

    // Update volunteer entry
    public function updateVolunteer($username, $vname, $vdate, $newVname, $newVdate) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $query = "UPDATE volunteer SET vname = :newVname, vdate = :newVdate WHERE username = :username AND nname = :vname AND vdate = :vdate";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':vname', $vname);
        $stmt->bindParam(':vdate', $vdate);
        $stmt->bindParam(':newVname', $newVname);
        $stmt->bindParam(':newVdate', $newVdate);

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $username ];
            $connMgr->handleError( $stmt, $query, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    // Delete volunteer entry
    public function deleteVolunteer($username, $vname, $vdate) {
        $query = "DELETE FROM volunteer WHERE Username = :username AND Vname = :vname AND Vdate = :vdate";
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':vname', $vname);
        $stmt->bindParam(':vdate', $vdate);

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $username ];
            $connMgr->handleError( $stmt, $query, $parameters );
        }

        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}
?>
