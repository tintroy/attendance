<?php $title = "View Records";
require_once "includes/header.php";
require_once 'db/conn.php';
$results = $crud->getAttendees();
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php //this php block can be inserted to any other html
            while($r = $results->fetch(PDO::FETCH_ASSOC)) { // do this operation in each item of this collection                                      
        ?>
        <tr>
            <td> <?php echo $r['attendee_id'] ?></td>
            <td> <?php echo $r['firstname'] ?></td>
            <td> <?php echo $r['lastname'] ?></td>
            <td> <?php echo $r['name'] ?></td>
            <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <!-- onclick is javascript once click the delete it will prompt or gice you a choice to confirm or not -->
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php // view button generate a link to view.php, then ?id is equal to echo the value
        }?>
    </table>

<br>
<br>
<br>
<br>
<?php require_once "includes/footer.php"; ?>