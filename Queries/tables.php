<html>

<body>
    <?php
    $db = pg_connect('host=localhost dbname=summer_intern user=Bhavya password=5792');

    $query = "SELECT Fname , Lname  FROM STUDENT,WORKS_ON,PROJECT  WHERE Dno=201 AND Proj_name=Pname AND SRN = Ssrn";
    $result = pg_query($query);
    if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    $numrows = pg_numrows($result);

    echo "<p>link = $db<br>
        result = $result<br>
        numrows = $numrows</p>"
    ?>

    <table>
        <tr>
            <th>fname</th>
            <th>lname</th>
        </tr>
        <?php
        for ($ri = 0; $ri < $numrows; $ri++) { ?>
            <tr>
                <?php $row = pg_fetch_array($result, $ri); ?>
                <td> <?php echo $row["Fname"] ?> </td>
                <td><?php echo $row["Lname"] ?> </td>
            </tr>
        <?php   }
    pg_close($db); ?>
</body>

</html>