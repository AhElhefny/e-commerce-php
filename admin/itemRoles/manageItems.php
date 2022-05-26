<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/24/2019
 * Time: 12:07 PM
 */
if($do=='Manage'){
    $stmt=$con->prepare("SELECT items.* ,categories.cat_Name , users.UserName 
                         FROM items
                         INNER JOIN categories ON items.cat_ID=categories.cat_ID 
                         INNER JOIN users ON items.UserID=users.UserID WHERE items.itRegStat=1");
    $stmt->execute();
    $data=$stmt->fetchAll();
    $Count= count($data);
}
elseif ($do=='Pending'){
    $stmt=$con->prepare("SELECT items.* ,categories.cat_Name , users.UserName FROM items
                         INNER JOIN categories ON items.cat_ID=categories.cat_ID 
                         INNER JOIN users ON items.UserID=users.UserID WHERE items.itRegStat=0");
    $stmt->execute();
    $data=$stmt->fetchAll();
    $Count= count($data);
}
?>
<?php
if($Count>0){
if($do=='Manage') {
    echo"<h1 class='text-center' > Manage Items </h1 >";
}
elseif ($do=='Pending'){
    echo"<h1 class='text-center' > Pending Items </h1 >";
}
?>
<div class="table-responsive">
    <table class="table table-bordered  main_table text-center">
        <tr>
            <th>#ID</th>
            <th>Item name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Country</th>
            <th>category</th>
            <th>User</th>
            <th>Registered Date</th>
            <th>Control</th>
        </tr>
        <?php
        foreach ($data as $item){
            ?>
            <tr>
                <td><?php echo $item['itemId']?></td>
                <td><?php echo $item['itName'] ?></td>
                <td><?php echo $item['itDescription'] ?></td>
                <td><?php echo $item['itPrice'] ?></td>
                <td><?php echo $item['itCountry'] ?></td>
                <td><?php echo $item['cat_Name'] ?></td>
                <td><?php echo $item['UserName'] ?></td>
                <td><?php echo $item['itDate']?></td>
                <td>
                    <a href="?do=Edit&itId=<?php echo $item['itemId'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    <a href="?do=Delete&itId=<?php echo $item['itemId'] ?>" class="btn btn-danger"><i class="fa fa-close "></i> Delete</a>
                    <?php
                    if($do=='Pending'){
                        ?>
                        <a href="?do=Approve&itId=<?php echo $item['itemId'] ?>" class="btn btn-info"><i class="fa fa-check "></i>Approve</a>
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
            echo '<h1 class="alert alert-info"> There is no Item to View</h1>';
        }?>
        <a class='btn btn-primary' href='?do=Add'><i class="fa fa-plus"></i> Add New Item</a>
