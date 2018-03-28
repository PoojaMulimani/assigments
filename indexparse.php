<?php 

$jsondata = file_get_contents("https://api.coursera.org/api/courses.v1");
$json = json_decode($jsondata,true);


$output = "";

?>

<table>
	<tbody>
		<tr>
			<th>CourseName</th>
			<th>CourseID</th>
			<th>CourseType</th>
		</tr>
			<?php	
			foreach ($json['elements'] as $elements){
				echo '<tr>';
				echo '<td>' . $elements['name'] . '</td>';
				echo '<td>' . $elements['id'] . '</td>';
				echo '<td>' . $elements['courseType'] . '</td>';
				echo '</tr>';
			}
			?>
	</tbody>
</table>
	
	
