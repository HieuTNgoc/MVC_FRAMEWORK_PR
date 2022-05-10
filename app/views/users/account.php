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
		<?php require_once APPROOT . '/views/users/components/left_nav_account.php'; ?>
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
			<?php require_once APPROOT . '/views/users/components/menu_settings_account.php'; ?>
		</div>
		<?php require_once APPROOT . '/views/users/components/update_info.php'; ?>
		<?php require_once APPROOT . '/views/users/components/change_password.php'; ?>
		<?php require_once APPROOT . '/views/users/components/confirm_logout_message.php'; ?>
	</div>
</body>

</html>