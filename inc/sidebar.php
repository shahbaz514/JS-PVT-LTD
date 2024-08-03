<?php
$sqlPro = mysqli_query($db, "SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$rowPro = mysqli_fetch_array($sqlPro);
?>
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info" style="background: url(images/user-img-background.jpg); background-size: cover;">
        <div class="image">
            <a href="profile.php">
            <?php
                if ($rowPro['img'] == "")
                {
                ?>
                <img src="images/user-lg.jpg" class="img-circle" style="width: 45px; height: 45px;" alt="<?php echo $rowPro['name']; ?>">
                <?php
                }
                else
                {
                ?>
                <img src="images/<?php echo $rowPro['img']; ?>" class="img-circle" style="width: 45px; height: 45px;" alt="<?php echo $rowPro['name']; ?>">
                <?php
                }
            ?>
            </a>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $rowPro['name']; ?>
            </div>
            <div class="email">
                <?php echo $rowPro['email']; ?>
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    keyboard_arrow_down
                </i>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="profile.php">
                            <i class="material-icons">person</i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="material-icons">input</i>
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                    <i class="material-icons">list</i>
                    <span>Files Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allFiles.php" class="waves-effect waves-block">
                            <span>Uploaded File Approvals</span>
                        </a>
                    </li>
                    <?php
                    $sqlGetCat = mysqli_query($db,"SELECT * FROM `categories` WHERE parent_id = '0'");
                    while ($rowGetCat = mysqli_fetch_array($sqlGetCat))
                    {
                        ?>
                        <li>
                            <a href="categories.php?cat=<?php echo $rowGetCat['id']; ?>" class="waves-effect waves-block">
                                <span>
                                    <?php
                                    echo $rowGetCat['name'];
                                    ?>
                                </span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                    <i class="material-icons">category</i>
                    <span>Categories Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allCategories.php" class="waves-effect waves-block">
                            <span>All Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="addCategories.php" class="waves-effect waves-block">
                            <span>Add New Category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                    <i class="material-icons">groups</i>
                    <span>Users Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allUsers.php" class="waves-effect waves-block">
                            <span>All Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="addUser.php" class="waves-effect waves-block">
                            <span>Add New User</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php" class="waves-effect waves-block">
                    <i class="material-icons">logout</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &#169; 2022 All Rights Reserved by
            <a href="#" target="_blank">
                JS Pvt LTD
            </a>
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
</aside>