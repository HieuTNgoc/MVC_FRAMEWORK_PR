<div class="response-model change-password">
    <div class="content-model">
        <form method="post">
            <div class="close-btn">
                <div class="icon">
                    <i class="material-icons">close</i>
                </div>
            </div>
            <div class="heading-info">
                <span>ĐỔI MẬT KHẨU</span>
            </div>

            <div class="content-info">
                <div class="row user-pass">
                    <div class="title-info">
                        <div class="head-title">Mật khẩu hiện tại</div>
                        <div class="sub-title">Mật khẩu hiện tại</div>
                    </div>
                    <div class="form-detail">
                        <input type="password" id="old_pass" name="old_pass" placeholder="Mật khẩu hiện tại">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row user-pass">
                    <div class="title-info">
                        <div class="head-title">Mật khẩu mới</div>
                        <div class="sub-title">Mật khẩu mới</div>
                    </div>
                    <div class="form-detail">
                        <input type="password" id="new_pass" name="new_pass" placeholder="Mật khẩu mới">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row user-pass">
                    <div class="title-info">
                        <div class="head-title">Nhập lại mật khẩu mới</div>
                        <div class="sub-title">Nhập lại mật khẩu mới</div>
                    </div>
                    <div class="form-detail">
                        <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row user-selector">
                    <div class="title-info">
                        <div class="head-title">Force logout</div>
                        <div class="sub-title">Tự động logout từ tất cả các thiết bị</div>
                    </div>
                    <div class="form-detail select-data">
                        <select name="logout-selector" id="logout-selector">
                            <option value="no">Không</option>
                            <option value="yes">Có</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row note">
                    <p>Thay đổi mật khẩu có thể bắt buộc yêu cầu bạn phải đăng nhập lại trên tất cả các thiết bị mobiles</p>
                </div>
            </div>
            <div class="footer-content">
                <button class="change-pass btn-skip  close-btn">Bỏ qua</button>
                <button id="submit-pass" class="change-pass btn-update">Cập nhật</button>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</div>