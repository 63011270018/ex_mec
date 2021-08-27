    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-lg">
        <a class="navbar-brand" href="index.php">ระบบจัดการผู้ใช้อินเตอร์เน็ต</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="user.list.php">จัดการผู้ใช้งาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="group.list.php">จัดการกลุ่มผู้ใช้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="online.list.php">รายการการใช้งาน</a>
                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="profile.php">แก้ไขข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="password.php">แก้ไขรหัสผ่าน</a>
                        <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
