<?php $title = "Index";
require_once "includes/header.php";
require_once 'db/conn.php';
$results = $crud->getSpecialties();
?>

<h1 class="text-center">Registration for IT Conference</h1>

<form method="post" action="success.php">
    <div class="form-group">
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name">
        </div> <!-- required - need to fill out the form. form validation -->
    <div class="form-group">
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name">
        </div>
    <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input  type="text" class="form-control" id="dob" name="dob">
        </div>
    <div class="form-group">
        <label for="specialty">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                <?php } ?>
        </select>
        </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>

    <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
</form>
<br>
<br>
<br>
<br>
<?php require_once "includes/footer.php"; ?>