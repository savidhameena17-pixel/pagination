<!DOCTYPE html>
<html>
    <head>
        <title>All users</title>
    </head>
    <body>
        <h2>ALL REGISTERED USERS</h2>
        <a href="<?php echo base_url('index.php/register'); ?>">Register New User</a><br><br>
        <br><br>
        <table border="1" cellpadding="10">
        <thead>    
        <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Created on</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->firstname; ?></td>
                        <td><?php echo $user->lastname; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->createdon; ?></td>
                        <td><a href="<?php echo site_url('user/delete/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td> No users found</td>
                        </tr>
                        <?php endif; ?>
                        <br><br>
        </tbody>
        </table>
        <div class="pagination">
                        <?php if ($current_page > 1): ?>
                            <a href="<?php echo site_url('user/users?page='.($current_page - 1)); ?>">Previous</a>
                            <?php endif; ?>
                        <?php for($i=1;$i<=$total_pages; $i++): ?>
                            <a href="<?php echo site_url('user/users?page='.$i); ?>"><?php echo $i; ?></a>
                            <?php endfor; ?>
                            <?php if ($current_page < $total_pages): ?>
                                <a href="<?php echo site_url('user/users?page='.($current_page + 1)); ?>">Next</a>
                            <?php endif; ?> 
        </div>
        </table>
    </body>
</html>