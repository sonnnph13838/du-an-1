<div class="container white">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h3 class="h3 color-red text-uppercase text-center mt-120 mb-80">
            -Đăng ký
          </h3>

          <form
            class="form-horizontal form-register"
            role="form"
            method="POST"
            action="https://jollibee.com.vn/register"
          >

            <div class="form-group">
              <label for="name" class="col-md-4 control-label"
                >Tên đăng nhập <span class="red">(*)</span>
              </label>

              <div class="col-md-8">
                <input
                  id="name"
                  type="text"
                  class="form-control"
                  name="name"
                  value=""
                  autofocus
                />
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="col-md-4 control-label"
                >SĐT <span class="red">(*)</span></label
              >

              <div class="col-md-8">
                <input
                  id="phone"
                  type="text"
                  class="form-control"
                  name="phone"
                  value=""
                  autofocus
                />
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="col-md-4 control-label"
                >Email <span class="red">(*)</span></label
              >

              <div class="col-md-8">
                <input
                  id="email"
                  type="email"
                  class="form-control"
                  name="email"
                  value=""
                />
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-md-4 control-label"
                >Mật khẩu <span class="red">(*)</span></label
              >

              <div class="col-md-8">
                <input
                  id="password"
                  type="password"
                  class="form-control"
                  name="password"
                />
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label"
                >Xác nhận mật khẩu <span class="red">(*)</span></label
              >

              <div class="col-md-8">
                <input
                  id="password-confirm"
                  type="password"
                  class="form-control"
                  name="password_confirmation"
                />
              </div>
            </div>

            <div class="form-group">
              <label for="birthday" class="col-md-4 control-label"
                >Ngày sinh</label
              >

              <div class="col-md-8">
                <input
                  id="birthday"
                  type="date"
                  class="form-control"
                  name="birthday"
                />
              </div>
            </div>

            <div class="form-group line-bottom">
              <label for="gender" class="col-md-4 control-label"
                >Giới tính</label
              >

              <div class="col-md-8">
                <p>
                  <label>
                    <input
                      name="group1"
                      type="radio"
                      checked=""
                      class="with-gap"
                    />
                    <span>Nam</span>
                  </label>

                  <label>
                    <input name="group1" type="radio" class="with-gap" />
                    <span>Nữ</span>
                  </label>
                  <label>
                    <input name="group1" type="radio" class="with-gap" />
                    <span>Khác</span>
                  </label>
                </p>
              </div>
            </div>
            <p>
              <label>
                <input type="checkbox" class="filled-in" />
                <span> Nhận chương trình khuyến mãi qua email</span>
              </label>
            </p>

            <div class="form-group mb-40">
              <div class="col-md-6">(*) Thông tin bắt buộc</div>
              <div class="col-md-6 text-right">
                <button
                  type="submit"
                  class="btn btn-color btn-lg text-uppercase"
                >
                  Đăng ký
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>