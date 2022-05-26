<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/24/2019
 * Time: 12:07 PM
 */
    if($do=='Manage'){
        $stmt=$con->prepare("SELECT * FROM users WHERE RegStatus=1 AND GroupID !=1 ");
        $stmt->execute();
        $data=$stmt->fetchAll();
        $Count= count($data);
    }
    elseif ($do=='Pending'){
        $stmt=$con->prepare("SELECT * FROM users WHERE RegStatus=0 AND GroupID !=1");
        $stmt->execute();
        $data=$stmt->fetchAll();
        $Count= count($data);
    }
?>
<?php
if($Count>0){
    if($do=='Manage') {
            echo"<h1 class='text-center' > Manage Members </h1 >";
        }
    elseif ($do=='Pending'){
        echo"<h1 class='text-center' > Pending Members </h1 >";
    }
?>
<div class="table-responsive">
    <table class="table table-bordered  main_table text-center">
        <tr>
            <th>#ID</th>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Full Name</th>
            <th>Registered Date</th>
            <th>Control</th>
        </tr>
        <?php
        foreach ($data as $item){
        ?>
        <tr>
            <td><?php echo $item['UserID']?></td>
            <td><?php echo $item['UserName'] ?></td>
            <td><?php echo $item['Email'] ?></td>
            <td><?php echo $item['FullName'] ?></td>
            <td><?php echo $item['Date']?></td>
            <td>
                <a href="?do=Edit&uId=<?php echo $item['UserID'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                <a href="?do=Delete&uId=<?php echo $item['UserID'] ?>" class="btn btn-danger"><i class="fa fa-close "></i> Delete</a>
                <?php
                    if($do=='Pending'){
                        ?>
                        <a href="?do=Approve&uId=<?php echo $item['UserID'] ?>" class="btn btn-info"><i class="fa fa-check "></i>Approve</a>
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
    echo '<h1 class="alert alert-info"> There is no members to View</h1>';
}?>
<a class='btn btn-primary' href='?do=Add'><i class="fa fa-plus"></i> Add New Member</a>
