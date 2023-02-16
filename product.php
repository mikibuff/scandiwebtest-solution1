<?php

Abstract Class Product {
    


    protected function dbConnect() {

        $server = "localhost";
        $username = "id20279561_scandiwebproductphp";
        $password = "[O#fZk&a1i^d+7w9";
        $db = "id20279561_products";


        $this->conn = new mysqli($server, $username, $password, $db);

        if (mysqli_connect_errno()) {
            // if an error occurred, raise it.
            $responseArray['response'] = '500';
            $responseArray['message'] = 'MySQL error: ' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
        } else {
            // success
            $responseArray['response'] = '200';
            $responseArray['message'] = 'Database connection successful.';
        }

        return $responseArray;
    }

    //--------------------------------------------------------------------------------------------------------------------
    protected function getResultSetArray($varQuery) {

        $rsData = $this->conn->query($varQuery);

        if (isset($this->conn->errno) && ($this->conn->errno != 0)) {
            $responseArray['response'] = '500';
            $responseArray['message'] = 'Internal server error. MySQL error: ' . $this->conn->errno;
        } else {

            $rowCount = $rsData->num_rows;

            if ($rowCount != 0) {
                $rsArray = $rsData->fetch_all(MYSQLI_ASSOC);

                $responseArray['response'] = '200';
                $responseArray['message'] = 'Success';
                $responseArray['productList'] = $rsArray;

                $rsData->free_result();
            } else {
                $responseArray['response'] = '204';
                $responseArray['message'] = 'Query did not return any results.';
            }
        }
        return $responseArray;
    }
    

}

?>