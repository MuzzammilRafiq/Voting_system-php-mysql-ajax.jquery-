<?php  
    $conn = mysqli_connect("localhost","root","","votingprocess") or die("connection failed:(");
    $sql = "SELECT * FROM `votes`";
    $result = mysqli_query($conn,$sql) or die("query failed;(");
    $table = "";
    if(mysqli_num_rows($result) > 0){
        $table = '<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>VOTES</th>
                <th>PARTY</th>
            </tr>
        </thead>';

            while($row = mysqli_fetch_assoc($result)){
                $table = $table.
                "<tbody>
                    <tr>
                        <td>{$row["sno"]}</td>
                        <td>{$row["name"]}</td>
                        <td>{$row["total_votes"]}</td>
                        <td>{$row["party"]}</td>
                    </tr>
                </tbody>";

            }

        $table = $table . '</table>';
            mysqli_close($conn);
            echo $table;
    }else{
        echo "<h2>No Records Fount:(</h2>";
    }
?>