<?php require "incl/header.php" ?>

	<div>
		<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Email</th>
    </tr>
<?php
$query = 'select * from users u';
$result = $con->query($query);

if ($result) {
    while ($row = $result->fetch_object()) {
       echo "<tr><td>$row->first_name</td>
            <td>$row->last_name</td>
            <td>$row->user_name</td>
			<td>$row->email</td>
            </tr>";
    }
} else {
    echo $connection->error;
}
?>
</table>
	</div>
	
<?php require "incl/footer.php" ?>