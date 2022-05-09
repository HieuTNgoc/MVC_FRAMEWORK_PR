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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?php echo URLROOT; ?>/public/js/account.js"></script>
</head>

<body>
	<i class='fas fa-user-circle' style='font-size:48px;color:red'></i>
	<div id="master">
		<div class="left-bar">
			<div class="items">
				<div class="item">
					<div class='avatar'>
						<img src="<?php echo URLROOT; ?>/public/img/<?php echo $data['img_url']; ?>" alt="" srcset="">
					</div>
				</div>
				<div class="item hover">
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

				<div class="footer logout-btn">
					<div class="icon">
						<i class="material-icons">directions_run</i>
					</div>
					<a href="#">Đăng xuất</a>
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
						<div class="title"><?php echo $data['last_name'] . ' ' . $data['first_name'] . ' - ' . $data['position']; ?></div>
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
							<div class="form-detail">
								<img id="img-upload" src="<?php echo URLROOT; ?>/public/img/<?php echo $data['img_url']; ?>" alt="Avatar">
								<form method='post'>
									<input type="file" name="img_url_upload" id="img_url_upload">
								</form>
							</div>
							
							<div class="upload-form">
								<form action="" method="post">
									<input type="file" name="image" id="" hidden>
									<input type="submit" value="submit" hidden>
								</form>
							</div>
						</div>
						<div class="detail-info">
							<div class="title">
								<?php echo $data['last_name'] . ' ' . $data['first_name']; ?>
							</div>
							<div class="sub-title">Trainee & Internship</div>
							<div class="info">
								<b>Địa chỉ email:</b> <?php echo $data['email']; ?>
							</div>
							<div class="info">
								<b>Số điện thoại:</b> <?php echo $data['phone']; ?>
							</div>

						</div>
					</div>
					<div class="list">
						<div class="title">Thông tin liên hệ</div>
						<div class="contact-info info">
							<b>Địa chỉ</b>
							<span class=""> <?php echo $data['address']; ?></span>
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
						<?php echo $data['last_name'] . ' ' . $data['first_name']; ?>
					</div>
					<div class="email-inf">
						<?php echo '@' . $data['username'] . ' - ' . $data['email'] ?>
					</div>
				</div>
				<div class="box">
					<div class="sub-heading">Thông tin tài khoản</div>
					<div class="items">
						<div class="item active">
							<div class="menu-icon">
								<i class="material-icons">settings</i>
							</div>
							<div class="info">Tài khoản</div>
						</div>
						<div class="item change-acc btn">
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
		<div class="response-model update-info">
			<div class="content-model">
				<form method="post" >
					<div class="close-btn">
						<div class="icon">
							<i class="material-icons">close</i>
						</div>
					</div>
					<div class="heading-info">
						<span>CHỈNH SỬA THÔNG TIN CÁ NHÂN</span>
					</div>

					<div class="content-info">
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Tên của bạn</div>
								<div class="sub-title">Tên của bạn</div>
							</div>
							<div class="form-detail">
								<input type="text" id="first_name" name="first_name" value="<?php echo $data['first_name']; ?>">
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Họ của bạn</div>
								<div class="sub-title">Họ của bạn</div>
							</div>
							<div class="form-detail">
								<input type="text" id="last_name" name="last_name" value="<?php echo $data['last_name']; ?>">
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Email</div>
								<div class="sub-title">Email của bạn</div>
							</div>
							<div class="form-detail">
								<div class="fake-input"><?php echo $data['email']; ?></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Username</div>
								<div class="sub-title">Username của bạn</div>
							</div>
							<div class="form-detail">
								<div class="fake-input">@<b><?php echo $data['username']; ?></b></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Vị trí công việc</div>
								<div class="sub-title">Vị trí công việc</div>
							</div>
							<div class="form-detail">
								<input type="text" name="position" id="position" value="<?php echo $data['position']; ?>">
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Ảnh đại diện</div>
								<div class="sub-title">Ảnh đại diện</div>
							</div>
							<div class="form-detail">
								<input type="file" name="img_url" id="img_url">
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Ngày tháng năm sinh</div>
								<div class="sub-title">Ngày tháng năm sinh</div>
							</div>
							<div class="form-detail">
								<select name="day" id="day" class="dob day">
								</select>
								<select name="month" id="month" class="dob month">
								</select>
								<select name="year" id="year" class="dob year">
								</select>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Số điện thoại</div>
								<div class="sub-title">Số điện thoại</div>
							</div>
							<div class="form-detail">
								<input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>">
							</div>
							<div class="clear"></div>
						</div>
						<div class="row user-info">
							<div class="title-info">
								<div class="head-title">Chỗ ở hiện nay</div>
								<div class="sub-title">Chỗ ở hiện nay</div>
							</div>
							<div class="form-detail">
								<input type="text" id="address" name="address" value="<?php echo $data['address']; ?>"></input>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="footer-content">
						<button class="change-info btn-skip  close-btn">Bỏ qua</button>
						<button id="submit" class="change-info btn-update">Cập nhật</button>
						<div class="clear"></div>
					</div>
				</form>
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
							<td><i class="material-icons">notifications_none</i></td>
                    		<td><div class="detail">Do you really want to logout?</div></td>
						</tr>
					</tbody>
                    
				</table>
				<div class="footer-content">
					<span id='no-msg' class='close-btn'>NO</span>
					<span id='yes-msg'>YES</span>
					<div class="clear"></div>
				</div>
            </div>
        </div>
	</div>
</body>

</html>