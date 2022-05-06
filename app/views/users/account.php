<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản - Base Account</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/account.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <i class='fas fa-user-circle' style='font-size:48px;color:red'></i>
    <div id="master">
        <div class="left-bar">
            <div class="items">
                <div class="item">
                    <div class='avatar'>
                        <img src="<?php echo URLROOT; ?>/public/img/avt.jpg" alt="" srcset="">
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="info">Cá nhân</div>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>

                    <div class="info">Thành viên</div>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="material-icons">usb</i>
                    </div>
                    <div class="info">Nhóm</div>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="material-icons">change_history</i>
                    </div>
                    <div class="info">TK Khách</div>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="material-icons">bookmark_border</i>
                    </div>
                    <div class="info">Ứng dụng</div>
                </div>

                <div class="footer">
                    <a href="<?php echo URLROOT; ?>/logout">Đăng xuất</a>    
                </div>
            </div>
        </div>
        <div class="content">
            <div class="page">
                <div class="app-title">
                    <div class="icon">
                        <i class="material-icons">arrow_back</i>
                    </div>
                    <div class="acc-info">
                        <div class="label">Tài khoản</div>
                        <div class="title">Trần Ngọc Hiếu · Trainee & Internship</div>
                    </div>
                    <div class="change-acc btn">
                        <div class="icon">
                            <i class="material-icons">arrow_upward</i>
                        </div>
                        Chỉnh sửa tài khoản
                    </div>
                </div>

                <div class="profile">
                    <div class="acc-edit">
                        <div class="icon">
                            <i class="material-icons">expand_more</i>
                        </div>
                        <div class="edit-menu">
                            <div class="item">Chỉnh sửa: Thông tin cơ bản</div>
                            <div class="item">Chỉnh sửa: Thông tin liên lạc</div>
                            <div class="item">Chỉnh sửa: Liên kết mạng xã hội</div>
                        </div>
                    </div>
                    <div class="main">
                        <div class="img upload-img">
                            <img src="<?php echo URLROOT; ?>/public/img/avt.jpg" alt="Avatar">
                            <div class="upload-form">
                                <form action="" method="post">
                                    <input type="file" name="image" id="" hidden>
                                    <input type="submit" value="submit" hidden>
                                </form>
                            </div>
                        </div>
                        <div class="detail-info">
                            <div class="title">
                                <?php echo $_SESSION['username']?>
                            </div>
                            <div class="sub-title">Trainee & Internship</div>
                            <div class="info">
                                <b>Địa chỉ email:</b> <?php echo $_SESSION['email']?>
                            </div>
                            <div class="info">
                                <b>Số điện thoại:</b> 0928374831
                            </div>

                        </div>
                    </div>
                    <div class="list">
                        <div class="title">Thông tin liên hệ</div>
                        <div class="contact-info info">
                            <b>Địa chỉ</b>
                            <span class="">5/6 Ngõ 32 Đỗ Đức Dục, Mễ Trì, Nam Từ Liêm, Hà Nội</span>
                        </div>
                    </div>
                    <div class="list">
                        <div class="title">Nhóm (x)</div>
                        <div class="item url">
                            <div class="name">Base HN</div>
                            <div class="info">164 Thành viên · Tham gia ngày 15-04-2022</div>
                            <div class="icon">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </div>
                        </div>

                    </div>
                    <div class="list">
                        <div class="title">Nhân viên trực tiếp (X)</div>
                        <div class="info"></div>
                        <div class="item-none">Không có thông tin.</div>
                    </div>
                    <div class="list">
                        <div class="title">Học vấn
                            <div class="add">
                                <div class="icon">
                                    <i class="material-icons">add_circle_outline</i>
                                </div>
                            </div>
                        </div>
                        <div class="info"></div>
                        <div class="item-none">Không có thông tin.</div>
                    </div>
                    <div class="list">
                        <div class="title">Kinh nghiệm làm việc
                            <div class="add">
                                <div class="icon">
                                    <i class="material-icons">add_circle_outline</i>
                                </div>
                            </div>
                        </div>
                        <div class="info"></div>
                        <div class="item-none">Không có thông tin.</div>
                    </div>
                    <div class="list last-item">
                        <div class="title">Giải thưởng & thành tích
                            <div class="add">
                                <div class="icon">
                                    <i class="material-icons">add_circle_outline</i>
                                </div>
                            </div>
                        </div>
                        <div class="info"></div>
                        <div class="item-none">Không có thông tin.</div>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="top box">
                    <div class="heading">
                        <?php
                            echo $_SESSION['username'];
                        ?>
                    </div>
                    <div class="email-inf">
                        @username - username@base.vn
                    </div>
                </div>
                <div class="box">
                    <div class="sub-heading">Thông tin tài khoản</div>
                    <div class="items">
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="info">Tài khoản</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">create</i>
                            </div>
                            <div class="info">Chỉnh sửa</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">translate</i>
                            </div>
                            <div class="info">Ngôn ngữ</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">error_outline</i>
                            </div>
                            <div class="info">Đổi mật khẩu</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">format_paint</i>
                            </div>
                            <div class="info">Đổi màu hiển thị</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">insert_invitation</i>
                            </div>
                            <div class="info">Lịch làm việc</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">security</i>
                            </div>
                            <div class="info">Bảo mật hai lớp</div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="sub-heading">Ứng dụng bảo mật</div>
                </div>
                <div class="box">
                    <div class="sub-heading">Tùy chỉnh nâng cao</div>
                    <div class="items">
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">access_time</i>
                            </div>
                            <div class="info">Lịch sử đăng nhập</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">devices</i>
                            </div>
                            <div class="info">Quản lý thiết bị</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">markunread</i>
                            </div>
                            <div class="info">Tùy chỉnh email thông báo</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">access_time</i>
                            </div>
                            <div class="info">Chỉnh sửa múi giờ</div>
                        </div>
                        <div class="item">
                            <div class="menu-icon">
                                <i class="material-icons">device_hub</i>
                            </div>
                            <div class="info">Ủy quyền tạm thời</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="response-model">
            <div class="content-model">
				<div class="close-btn">
					<div class="icon">
                        <i class="material-icons">close</i>
                    </div>
				</div>
				<table class="header-content">
					<tbody>
						<tr>
							<td><i class="material-icons">error_outline</i></td>
                    		<td><div class="detail"></div></td>
						</tr>
					</tbody>
                    
				</table>
				<div class="footer-content close-btn">
					OK
				</div>
            </div>
        </div>
    </div>
</body>

</html>