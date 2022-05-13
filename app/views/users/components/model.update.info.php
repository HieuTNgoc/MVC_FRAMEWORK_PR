<div class="response-model update-info">
    <div class="content-model">
        <form id="update-info" method="post">
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
                        <input type="file" accept="image/*"  name="img_url" id="img_url">
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