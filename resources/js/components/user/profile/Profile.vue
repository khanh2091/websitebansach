<template>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'trangchu',
                                            },
                                        ]"
                                        :to="{ name: 'trangchu' }"
                                    >
                                        Trang chủ
                                    </router-link>
                                </li>
                                <li
                                    aria-current="page"
                                    class="breadcrumb-item active"
                                >
                                    Tài khoản của tôi
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
                        <div class="card sidebar-menu">
                            <div class="card-header">
                                <h3 class="h4 card-title">Chức năng</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'profile',
                                            },
                                        ]"
                                        :to="{ name: 'profile' }" class="nav-link"
                                        ><i class="fa fa-user"></i>Tài khoản của
                                        tôi</router-link
                                    >
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'checkorder',
                                            },
                                        ]"
                                        :to="{ name: 'checkorder' }"
                                        class="nav-link"
                                        ><i class="fa fa-list"></i>Đơn hàng</router-link
                                    ><a
                                        href="customer-wishlist.html"
                                        class="nav-link"
                                        ><i class="fa fa-heart"></i> Doanh sách
                                        yêu thích</a
                                    ><button
                                        @click="logout"
                                        class="button button1"
                                    >
                                        <i class="fa fa-sign-out"></i> Đăng xuất
                                    </button>
                                </ul>
                            </div>
                        </div>
                        <!-- /.col-lg-3-->
                        <!-- *** CUSTOMER MENU END ***-->
                    </div>
                    <div class="col-lg-9">
                        <div class="box">
                            <h1>Tài khoản của tôi</h1>
                            <p class="lead">
                                Thay đổi thông tin cá nhân hoặc mật khẩu của bạn
                                nơi đây.
                            </p>
                            <h3>Đổi mật khẩu</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_old"
                                            >Mật khẩu cũ</label
                                        >
                                        <input
                                            id="password_old"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_1"
                                            >Mật khẩu mới</label
                                        >
                                        <input
                                            id="password_1"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_2"
                                            >Xác nhận mật khẩu</label
                                        >
                                        <input
                                            id="password_2"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                            </div>
                            <!-- /.row-->
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Save new password
                                </button>
                            </div>
                            <h3 class="mt-5">Thông tin khác hàng</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Họ: </label>
                                        <input
                                            id="firstname"
                                            type="text"
                                            :class="{
                                                'is-invalid':
                                                    errors.firstname != null,
                                            }"
                                            class="form-control"
                                            v-model="firstname"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.firstname != null"
                                        >
                                            {{ errors.firstname }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname"
                                            >Tên lót & Tên:
                                        </label>
                                        <input
                                            id="lastname"
                                            type="text"
                                            :class="{
                                                'is-invalid':
                                                    errors.lastname != null,
                                            }"
                                            class="form-control"
                                            v-model="lastname"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.lastname != null"
                                        >
                                            {{ errors.lastname }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company">Email:</label>
                                        <input
                                            id="email"
                                            type="text"
                                            :class="{
                                                'is-invalid':
                                                    errors.email != null,
                                            }"
                                            class="form-control"
                                            v-model="email"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.telephone != null"
                                        >
                                            {{ errors.email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input
                                            :class="{
                                                'is-invalid':
                                                    errors.address != null,
                                            }"
                                            id="address"
                                            type="text"
                                            class="form-control"
                                            v-model="address"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.address != null"
                                        >
                                            {{ errors.address }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row-->
                            <div class="row">
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone"
                                            >Số điện thoại</label
                                        >
                                        <input
                                            id="telephone"
                                            type="text"
                                            :class="{
                                                'is-invalid':
                                                    errors.telephone != null,
                                            }"
                                            class="form-control"
                                            v-model="telephone"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.telephone != null"
                                        >
                                            {{ errors.telephone }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row-->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        @click="checkForm"
                                    >
                                        <i class="fa fa-save"></i> Thay đổi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $ from "jquery";
import axios from "axios";
import swal from "sweetalert";
export default {
    data() {
        return {
            errors: {
                firstname: null,
                lastname: null,
                address: null,
                province: null,
                state: null,
                telephone: null,
                email: null,
            },
            dataUser: [],
            auth: "",
            email: "",
            firstname: "",
            lastname: "",
            address: "",
            telephone: "",
            firstname: "",
            password: "",
            confirmpasswork: "",
        };
    },
    watch: {
    },
    mounted() {
        if (localStorage.usertoken.length != 0) {
            this.getUser();
        }
    },
    methods: {
        checkForm: function (e) {
            this.errors = [];

            if (!this.firstname) {
                this.errors.firstname = "Họ đang trống";
            }
            if (!this.lastname) {
                this.errors.lastname = "Tên đang trống";
            }
            if (!this.email) {
                this.errors.email = "Email đang trống";
            }
            if (!this.telephone) {
                this.errors.telephone = "Số điện thoại đang trống";
            }
            if (!this.address) {
                this.errors.address = "Địa chỉ đang trống";
            }
            if (!this.province_id) {
                this.errors.province = "Chưa chọn tỉnh thành phố";
            }
            if (!this.state_id) {
                this.errors.state = "Chưa chọn quận huyện";
            }
            if (
                this.firstname != null &&
                this.lastname != null &&
                this.address != null &&
                this.province_id != null &&
                this.state_id != null &&
                this.telephone != null &&
                this.email != null
            ) {
                var tamp = Math.floor(Math.random() * 1000000000);
                console.log(this.dataUser.user.id);
                axios
                    .post(`/api/user/order`, {
                        order_number: tamp.toString(),
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        total: this.total,
                        user_id: this.dataUser.user.id,
                        page_number: this.page_number,
                        address: this.address,
                        telephone: this.telephone,
                        discount: 0,
                        status: "new",
                    })
                    .then((response) => {
                        this.carts.forEach((value, index) => {
                            // console.log(parseInt(value.quatity) * parseInt(value.price));
                            axios
                                .post("/api/user/order_details", {
                                    order_id: tamp,
                                    product_id: value.ma,
                                    price: value.price,
                                    discount: 0,
                                    quantity: value.quatity,
                                })
                                .then((response) => {})
                                .catch(function (error) {
                                    console.log(error);
                                });
                        });
                        localStorage.removeItem("cart")
                        swal("Thêm thành công!", "", "success");
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            e.preventDefault();
        },
        loadpage: function () {
            this.$router.go();
        },
        tamp: function () {
            console.log(localStorage.usertoken);
            console.log(this.dataUser);
        },
        logout: function () {
            localStorage.removeItem("usertoken");
            localStorage.removeItem("cart");
            this.$router.push({ name: "trangchu" });
            this.$router.go();
        },
        loadEventBus: function () {
            EventBus.$on("logged-in", (status) => {
                this.auth = status;
            });
        },
        getUser: function () {
            axios
                .get("/api/profile", {
                    headers: {
                        Authorization: `Bearer ${localStorage.usertoken}`,
                    },
                })
                .then((response) => {
                    this.dataUser = response;
                    // console.log(this.dataUser);
                    this.firstname = this.dataUser.data.user.firstname;
                    this.lastname = this.dataUser.data.user.lastname;
                    this.email = this.dataUser.data.user.email;
                    this.address = this.dataUser.data.user.address;
                    this.telephone = this.dataUser.data.user.telephone;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
