<?php
	

if($do=='Manage'){
    $stmt=$con->prepare("SELECT comments.*,users.UserName,items.itName FROM comments INNER JOIN users ON users.UserID=comments.user_id INNER JOIN items ON items.itemId=comments.item_id WHERE c_status=1");
    $stmt->execute();
    $data=$stmt->fetchAll();
    $Count= count($data);
}
elseif ($do=='Pending'){
    $stmt=$con->prepare("SELECT comments.*,users.UserName,items.itName FROM comments INNER JOIN users ON users.UserID=comments.user_id INNER JOIN items ON items.itemId=comments.item_id WHERE c_status=0");
    $stmt->execute();
    $data=$stmt->fetchAll();
    $Count= count($data);
}
?>
<?php
if($Count>0){
if($do=='Manage') {
    echo"<h1 class='text-center' > Manage Comments </h1 >";
}
elseif ($do=='Pending'){
    echo"<h1 class='text-center' > Pending Comments </h1 >";
}
?>
<div class="table-responsive">
    <table class="table table-bordered  main_table text-center">
        <tr>
            <th>#ID</th>
            <th>user</th>
            <th>Comment</th>
            <th>Registered Date</th>
            <th>Item</th>
            <th>Control</th>
        </tr>
        <?php
        foreach ($data as $item){
            ?>
            <tr>
                <td><?php echo $item['c_id']?></td>
                <td><?php echo $item['UserName'] ?></td>
                <td><?php echo $item['comment'] ?></td>
                <td><?php echo $item['c_date'] ?></td>
                <td><?php echo $item['itName']?></td>
                <td>
                    <a href="?do=Delete&CId=<?php echo $item['c_id'] ?>" class="btn btn-danger"><i class="fa fa-close "></i> Delete</a>
                    <?php
                    if($do=='Pending'){
                        ?>
                        <a href="?do=Approve&CId=<?php echo $item['c_id'] ?>" class="btn btn-info"><i class="fa fa-check "></i>Approve</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        <?php }
        echo'</table>
</div>';
        }
        elseif ($Count==0){
            $msg= '<h1 class="alert alert-info"> There is no Item to View</h1>';
            redirectTo($msg,3);
        }?>
