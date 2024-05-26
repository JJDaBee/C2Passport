<?php

class UserDAO {
       
    function get( $username ) {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare select
        $sql = "SELECT *  FROM useraccount WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            
        $user = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $user = new User($row["username"], $row["fname"], $row["lname"], $row["phoneno"], $row["address"], $row["aoi"], $row["password_hash"], $row["role"]);
            }
            
        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $user;
    }
    
    function create($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO useraccount (username, fname, lname, phoneno, address, aoi, password_hash, role) VALUES (:username, :fname, :lname, :phoneno, :address, :aoi, :passwordHash, :role)";
        $stmt = $conn->prepare($sql);
        
        $username = $user->getUsername();
        $fname = $user->getFname();
        $lname = $user->getLname();
        $phoneno = $user->getPhoneno();
        $address = $user->getAddress();
        $aoi = $user->getAoi();
        $passwordHash = $user->getPasswordHash();
        $role = $user->getRole();

        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':phoneno', $phoneno, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':aoi', $aoi, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(":role", $role, PDO::PARAM_STR);
        
        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    function update($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "UPDATE useraccount SET password_hash = :passwordHash  WHERE username = :username";
        $stmt = $conn->prepare($sql);
        
        $username = $user->getUsername();
        $passwordHash = $user->getPasswordHash();

        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}