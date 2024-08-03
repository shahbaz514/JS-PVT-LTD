<?php
session_start();
session_abort();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
if ($_SESSION['role'] == 'Data Uploader')
{
    header("Location: dataUploader.php");
}
include 'inc/head.php';

if (isset($_GET['id']))
{
    $sqlDel = mysqli_query($db, "DELETE FROM categories WHERE id = '".$_GET['id']."'");
    if ($sqlDel)
    {
        echo "<script>window.open('allCategories.php', '_self')</script>";
    }
}
?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ALL CATEGORIES</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                ALL CATEGORIES
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody style="text-align: center!important;">

                                    <?php
                                    $sqlUsers = mysqli_query($db, "SELECT * FROM categories ORDER BY id ASC");
                                    while ($rowUser = mysqli_fetch_array($sqlUsers))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowUser['name'] ; ?></td>
                                            <td><?php echo $rowUser['parent_id'] ; ?></td>
                                            <td><?php echo $rowUser['date'] ; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="allCategories.php?id=<?php echo $rowUser['id']; ?>">
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