

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
    require_once 'app/models/PDO_Database.inc.php';
    try {
        $conn = Database::connect();
        $conn->exec('set names utf8');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_tid = tenant.tid AND incomings.Incometypes_id = 1";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    foreach ($conn->query($stmt) as $row) {
        $tid = $row['tid'];
        $id = $row['id'];
        $Accommodation_id = $row['Accommodation_id'];

        echo '<tr>';
        echo '<td>' . $row['forename'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['street'] . '</td>';
        echo '<td>' . $row['amount'] . ' €' . '</td>';
        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_tid = $tid AND incomings.Incometypes_id = 2;";
        foreach ($conn->query($stmt) as $row) {
            echo '<td>' . $row['amount'] . ' €' . '</td>';
        }
        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_tid = $tid AND incomings.Incometypes_id = 4;";
        foreach ($conn->query($stmt) as $row) {
            echo '<td>' . $row['amount'] . ' €' . '</td>';
        }
    }
    $conn = Database::disconnect();
    ?>
</table>