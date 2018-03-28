<html>  
      <head>  
           <title>Assignment</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>
   
   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>  
      <body>  
        <div class="container box">
          <h3 align="center">JSON File Data into Mysql Database in PHP</h3><br />
          <?php
          $connect = mysqli_connect("localhost", "root", "", "test"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "employee_data.json";
          $jsondata = file_get_contents($filename); //Read the JSON file in PHP
          $json = json_decode($jsondata,true); //Convert JSON String into PHP Array
          foreach($json['elements'] as $row) //Extract the Array Values by using Foreach Loop
          {
           $query .= "INSERT INTO tbl_employee(coursename, courseid, courseType) VALUES ('".$row["name"]."', '".$row["id"]."', '".$row["courseType"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
       <td>'.$row["name"].'</td>
       <td>'.$row["id"].'</td>
       <td>'.$row["courseType"].'</td>
       <td><button type="button" class="btn btn-primary">Save</button></td>
       <td><button type="button" class="btn btn-info">View</button></td>
      </tr>
           '; //Data for display on Web page
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3>Imported JSON Data</h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <th width="45%">CourseName</th>
         <th width="10%">CourseID</th>
         <th width="45%">CourseType</th>
         <th width="45%">SAVE</th>
         <th width="45%">VIEW</th>
        </tr>
     ';
     echo $table_data;  
     echo '</table>';
          }




          ?>
     <br />
         </div>  
      </body>  
 </html>  