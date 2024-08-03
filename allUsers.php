<?php
session_start();
session_abort();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
include 'inc/head.php';

if ($_SESSION['role'] == 'Data Uploader')
{
    header("Location: dataUploader.php");
}
elseif ($_SESSION['role'] == 'Admin Manager')
{
    header("Location: index.php");
}
?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ALL USERS</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                ALL USERS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody style="text-align: center!important;">

                                    <?php
                                    $sqlUsers = mysqli_query($db, "SELECT * FROM users ORDER BY id ASC");
                                    while ($rowUser = mysqli_fetch_array($sqlUsers))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowUser['name'] ; ?></td>
                                            <td><?php echo $rowUser['username'] ; ?></td>
                                            <td><?php echo $rowUser['email'] ; ?></td>
                                            <td>
                                                <?php
                                                if ($rowUser['img'] != "")
                                                {
                                                    ?>
                                                    <img class="img-rounded" style="width: 100px; height: 100px;" src="images/<?php echo $rowUser['img'] ; ?>" alt="<?php echo $rowUser['name'] ; ?>">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rowUser['role'] ; ?></td>
                                            <td><?php echo $rowUser['date'] ; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="allUsers.php?id=<?php echo $rowUser['id']; ?>">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php
include 'inc/footer.php';
?>