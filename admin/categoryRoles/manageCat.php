<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/8/2019
 * Time: 6:11 PM
 */
$stmt=$con->prepare('SELECT * FROM categories ORDER BY ordering ');
$stmt->execute();
$data=$stmt->fetchAll();
$count=$stmt->rowCount();
if($count>0){
?>
    <h1 class="text-center">Manage Categories</h1>
    <div class="table-responsive">
    <table class="table table-bordered  main_table text-center">
        <tr>
            <th>#ID</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Visibility</th>
            <th>Comments</th>
            <th>Ads</th>
            <th>Registered Date</th>
            <th>Control</th>
        </tr>
        <?php
        foreach ($data as $cat){

        echo "<tr>";
        echo "<td>" . $cat['ordering'] . "</td>";
        echo "<td>" . $cat['cat_Name'] . "</td>";
        echo "<td>" . $cat['description'] . "</td>";
        if($cat['visibility']==1){
            echo "<td><span class='v-yes'><i class='fa fa-eye'></i> Visible</span></td>";
        }
        else{
            echo "<td><span class='v-no'><i class='fa fa-eye-slash'></i> Invisible</span></td>";
        }
        if($cat['allowComment']==1){
            echo "<td><span class='d-yes'><i class='fa fa-check'></i> Enable</span></td>";
        }else{
            echo "<td><span class='d-no'><i class='fa fa-close'></i> Disable</span></td>";
        }
        if($cat['allowAds']==1){
            echo "<td><span class='d-yes'><i class='fa fa-check'></i> Enable</span></td>";
        }else{
            echo "<td><span class='d-no'><i class='fa fa-close'></i> Disable</span></td>";
        }
        echo "<td>" . $cat['Date'] . "</td>";
        echo "<td>";
        ?>
                <a href="?do=Edit&catId=<?php echo $cat['cat_ID'] ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                <a href="?do=Delete&catId=<?php echo $cat['cat_ID'] ?>" class="btn btn-danger"><i class="fa fa-close "></i> Delete</a>
            </td>
        </tr>
        <?php
         }
    echo'</table>
</div>';

}elseif ($count==0){
    echo '<h1 class="alert alert-info"> There is no Category to View</h1>';
}
?>
<a class='btn btn-primary' href='?do=Add'><i class="fa fa-plus"></i> Add New Category</a>
