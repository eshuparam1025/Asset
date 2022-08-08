<div class="dashboard_sidebar" id="dashboard_sidebar">
                <h3 class="dashboard_logo" id="dashboard_logo">AMS</h3>
                <div class="dashboard_sidebar_user">
                    <img src="images/user/user.jpg" alt="User image." id="userImage"/>
                    <span><?= $user['First_Name'].' '.$user['Last_Name'] ?></span>
                </div>
                <div class="dashboard_sidebar_menu">
                    <ul class="dashboard_menu_lists" >
                        <!-- class="menuActive" -->
                        <li>
                            <a href="./dashboard.php"><i class="fa fa-dashboard menuIcons"></i><span class="menuText">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="./user-add.php"><i class="fa-solid fa-user-plus"></i><span class="menuText"> Add Users</span></a>
                        </li>
                        <li>
                            <a href="./a-add.php" ><i class="fa-solid fa-user-plus"></i><span class="menuText"> Assets</span></a>
                        </li>

                    </ul>
                </div>
            </div>