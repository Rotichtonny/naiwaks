<?php include 'includes/header.php'; ?>
    <h2 class="page-header">Edit Job</h2>
    <form action="edit.php?id=<?php echo $job->id; ?>" method="post">
        <div class="form-group">
            <label>Company</label>
            <input type="text" name="company" class="form-control" value="<?php echo $job->company; ?>">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select type="text" name="category" class="form-control">
                <option value="0">--Choose Category--</option>
                    <?php foreach($categories as $category): ?>
                        <?php if($job->category_id == $category->id) : ?>
                            <option value="<?php echo $category->id; ?>" selected><?php echo $category->name ?></option>
                        <?php else: ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
                        <?php endif ?>
                        
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" value="<?php echo $job->job_title; ?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="descriptions" class="form-control"><?php echo $job->descriptions; ?></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="locations" class="form-control" value="<?php echo $job->locations; ?>">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" name="salary" class="form-control" value="<?php echo $job->salary; ?>">
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" name="contact_user" class="form-control" value="<?php echo $job->contact_user; ?>">
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" name="contact_email" class="form-control" value="<?php echo $job->contact_email; ?>">
        </div>
        <input type="submit" value="Submit" name="submit" class="btn btn-default">
        <br><br>
    </form>
<?php include 'includes/footer.php'; ?>