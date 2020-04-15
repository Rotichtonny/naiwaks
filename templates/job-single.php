<?php include 'includes/header.php'; ?>
    <h2 class="page-header"><?php echo $job->job_title; ?>(<?php echo $job->locations; ?>)</h2>
    <small>Posted By <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?></small>
    <hr>
    <p class="lead"><?php echo $job->descriptions; ?></p>
    <ul class="list-group">
        <li class="list-group-item"><strong>Company: </strong><?php echo $job->company; ?></li>
        <li class="list-group-item"><strong>Salary: </strong>Ksh <?php echo $job->salary; ?></li>
        <li class="list-group-item"><strong>Contact Email: </strong><?php echo $job->contact_email; ?></li>
    </ul>
    <br><br>
    <a href="index.php" >Go Back</a>
    <br><br>
    <div class="well">
        <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-default">Edit</a>
        <form style="display:inline;" action="job.php" method="post">
            <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
<?php include 'includes/footer.php'; ?>