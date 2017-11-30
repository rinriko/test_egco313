<?php
// Connecting, selecting database
$conn_string = "host=ec2-54-221-246-84.compute-1.amazonaws.com port=5432 dbname=daq9lu04gda0hj user=aqzpuaxmdwjsrw password=7f8647de0ef64d1abeaf3b7466de284f11576b313924ac041ed313ce0d0baba8");
$dbconn = pg_connect($conn_string);
// Performing SQL query
$query = 'SELECT * FROM authors';
$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>