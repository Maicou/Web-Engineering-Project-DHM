

    <table>
    <tr>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Adresse</th>
                <th>Miete</th>
                <th>Nebenkosten</th>
                <th>Kaution</th>
            </tr>
    <?php
    
    
    require_once '../app/models/PDO_Database.inc.php';
            try {
               // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 $conn = Database::connect();
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = "SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid AND incomings.Incometypes_id = 1";
//                $stmt->bindParam(':email', $this->email);
//                $stmt->bindParam(':password', $pass);
                
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    
     
                    foreach ($conn->query($stmt) as $row) {
                         $tid = $row['tid'];
                        
                        echo '<tr>';
                        echo '<td>' . $row['forename'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['street'] . '</td>';
                        echo '<td>' . $row['amount'] . ' €' . '</td>';
//                        echo '<td>' . $row['excludingIncome'] . '</td>';
//                        echo '<td width=250>';
                        
//                echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';
                        //$row[''];
//                        echo '&nbsp;';
//                        echo '<a class="actionbutton" href="../public/RentalAdministration/updateTenantHouse1/' . $row['tid'] . '">Update</a>';
//                        echo '&nbsp;';
//                        echo '<a class="actionbutton" href="../public/RentalAdministration/deleteTenants/' . $row['tid'] . '/' .$row['id']. '/' .$row['Accommodation_id'].'/' ."one".'">Delete</a>';
                       
                        
                        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 2;";
                        foreach ($conn->query($stmt) as $row) {
                            echo '<td>' . $row['amount'] . ' €' . '</td>';
                        }
                        
                        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 4;";
                        foreach ($conn->query($stmt) as $row) {
                            echo '<td>' . $row['amount'] . ' €' . '</td>';
                        }
                    }

                    $conn = Database::disconnect();
                    ?>





                </table>