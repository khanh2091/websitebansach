<template>
    <div>
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
                                        Đăng ký / Đăng nhập
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6">
                            <div class="box">
                                <h1>Đăng ký</h1>
                                <p class="lead">
                                   Chưa có tài khoản?
                                </p>
                                <hr />
                                <form v-on:submit.prevent="register">
                                    <div class="form-group">
                                        <label for="fisrtname">Họ:</label>
                                        <input
                                            v-model="firstname"
                                            id="name"
                                            type="text"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname"
                                            >Tên lót & tên:</label
                                        >
                                        <input
                                            v-model="lastname"
                                            id="lastname"
                                            type="text"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                            v-model="email"
                                            id="email"
                                            type="text"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            v-model="password"
                                            id="password"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="cofirmpassword"
                                            >Confrim password</label
                                        >
                                        <input
                                            v-model="cofirmpassword"
                                            id="cofirmpassword"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn giới tính:</label>
                                        <div>
                                            <label
                                                style="margin-left: 20px"
                                                class="radio"
                                                v-for="(
                                                    gender, index
                                                ) in genders"
                                                :key="index"
                                            >
                                                <input
                                                    type="radio"
                                                    :value="gender.code"
                                                    v-model="selGender"
                                                    @click="
                                                        selectedGender(
                                                            gender.code
                                                        )
                                                    "
                                                />
                                                {{ gender.description }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday"
                                            >Chọn ngày sinh:</label
                                        >
                                        <div>
                                            <date-picker
                                                v-model="time1"
                                                valueType="format"
                                            ></date-picker>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phonenumber"
                                            >Số điện thoại:</label
                                        >
                                        <input
                                            v-model="phonenumber"
                                            id="phonenumber"
                                            type="phonenumber"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ:</label>
                                        <input
                                            v-model="address"
                                            id="address"
                                            type="address"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="text-center">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-user-md"></i>
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box">
                                <h1>Đăng nhập</h1>
                                <p class="lead">Đã có tài khoản?</p>
                                <hr />
                                <form v-on:submit.prevent="login">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                            v-model="loginemail"
                                            id="email"
                                            type="text"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            v-model="loginpassword"
                                            id="password"
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>

                                    <div class="text-center">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-sign-in"></i> Log in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import swal from "sweetalert";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import EventBus from "../EventBus.vue";
export default {
    components: { DatePicker },
    data() {
        return {
            time1: null,
            selGender: 1,
            genders: [
                {
                    code: 1,
                    description: "Nam",
                },
                {
                    code: 0,
                    description: "Nữ",
                },
            ],
            firstname: "",
            lastname: "",
            email: "",
            password: "",
            address: "",
            cofirmpassword: "",
            birthday: "",
            phonenumber: "",
            loginemail: "",
            loginpassword: "",
        };
    },
    methods: {
        selectedGender(option) {
            this.selGender = option;
        },
        register() {
            if (this.password != this.cofirmpassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Mật khẩu không trùng",
                });
            } else {
                axios
                    .post("/api/register", {
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        telephone: this.phonenumber,
                        gender: this.selGender,
                        address: this.address,
                        birthday: this.time1,
                    })
                    .then((res) => {
                        console.log(res);
                        swal("Đăng ký!", "thành công", "success");
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
        login() {
            axios
                .post("/api/login", {
                    email: this.loginemail,
                    password: this.loginpassword,
                })
                .then((res) => {
                    localStorage.setItem("usertoken", res.data.token);
                    this.loginemail = "";
                    this.loginpassword = "";
                    this.$router.push({ name: 'trangchu'})
                })
                .catch((err) => {
                    console.log(err);
                });

            this.emitMethod();
        },

        emitMethod() {
            EventBus.$emit("logged-in", "loggedin");
        },
    },
};
</script>
