<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('connbd.php');

require_once('sessonchek.php');
// Get the books from the database

$query = "SELECT * FROM lessons";
$courses = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); 
//navbar
include 'navANDhead.php';
?>
    <a class='button' href="uplodecourseform.php"><span>&#43;</span>Add<br>Course</a>
    <table>
        <tr>
            <th>Techer name</th>
            <th>Department</th>
            <th>Level degree</th>
            <th>Topec</th>
            <th>Title</th>
            <th>Description</th>
			<th>Read Now</th>
        </tr>
        <!-- dispaly al books in db secton -->
        <?php foreach ($courses as $course): ?>
        <tr>
            <?php
            $query2 = "SELECT username FROM users WHERE id = ?";
            $stmt = $db->prepare($query2);
            $stmt->execute([$course['teacher_id']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Access the username value  echo $course['class_level']; 
            $username = $result['username'];
            ?>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $course['department_id']; ?></td>
            <td><?php
            if ($course['class_level']>10) {
                if ($course['class_level']==11) {
                    echo "1er Master"; 
                }else{ echo "2emm Master";}
            }else{
                if ($course['class_level']==1) {
                    echo "1er";
                }
                if ($course['class_level']==2) {
                    echo "2emme";
                }if($course['class_level']==3) {
                    echo "3emme";
                }

            } 
            ?></td>
            <td><?php echo $course['topec']; ?></td>
            <td><?php echo $course['title']; ?></td>
            <td><?php echo $course['description']; ?></td>
            <td><a href="<?php echo $course['file_path']; ?>">PDF File</a></td>
            <!-- the download book secton -->

        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
