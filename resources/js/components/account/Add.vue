<template>
    <div>
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'home' }]"
                            :to="{ name: 'home' }"
                        >
                            <i
                                class="fas fa-home"
                                style="height: 10px; width: 10px"
                            ></i>
                        </router-link>
                    </li>
                    <li style="float: left">/</li>
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'account' }]"
                            :to="{ name: 'account' }"
                            >Danh sách tài khoản</router-link
                        >
                    </li>
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'addLanguage' }]"
                            :to="{ name: 'addLanguage' }"
                            >Thêm tài khoản</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addAccount' }]"
                    :to="{ name: 'addAccount' }"
                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <svg
                        class="icon icon-xs me-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        ></path>
                    </svg>
                    Thêm tài khoản
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div>
                <div class="card-header py-3">
                    <h6 class="mt-2 font-weight-bold text-primary float-left">
                        Thêm tài khoản
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Họ: </label>
                                            <input
                                                id="firstname"
                                                type="text"
                                                :class="{
                                                    'is-invalid':
                                                        errors.firstname !=
                                                        null,
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
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company"
                                                >Ngày sinh:</label
                                            >
                                            <br />
                                            <date-picker
                                                :class="{
                                                    'is-invalid':
                                                        errors.birthday != null,
                                                }"
                                                v-model="birthday"
                                                valueType="format"
                                            ></date-picker>
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.birthday != null"
                                            >
                                                {{ errors.birthday }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.address != null"
                                            >
                                                {{ errors.address }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
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
                                                v-if="errors.email != null"
                                            >
                                                {{ errors.email }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
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
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company"
                                                >Mật khẩu:</label
                                            >
                                            <input
                                                id="email"
                                                type="text"
                                                :class="{
                                                    'is-invalid':
                                                        errors.password != null,
                                                }"
                                                class="form-control"
                                                v-model="password"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.password != null"
                                            >
                                                {{ errors.password }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row" style="margin-top: 20px">
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
                                                        errors.telephone !=
                                                        null,
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Quyền</label>
                                            <select
                                                class="form-select"
                                                v-model="role"
                                                :class="{
                                                    'is-invalid':
                                                        errors.role != null,
                                                }"
                                            >
                                                <option :value="'employee'">
                                                    Nhân viên
                                                </option>
                                                <option :value="'customer'">
                                                    Khách hàng
                                                </option>
                                                <option :value="'admin'">
                                                    Quản trị viên
                                                </option>
                                            </select>
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.role != null"
                                            >
                                                {{ errors.role }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="form-group my-3">
                                    <button
                                        @click="checkForm"
                                        class="btn btn-success text-white"
                                    >
                                        Thêm tài khoản
                                    </button>
                                    <button
                                        type="reset"
                                        class="btn btn-warning text-white"
                                    >
                                        Xoá
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
import axios from "axios";
import swal from "sweetalert";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
export default {
    components: { DatePicker },
    data() {
        return {
            email: null,
            firstname: null,
            lastname: null,
            birthday: null,
            telephone: null,
            role: null,
            address: null,
            selGender: 1,
            password: null,
            errors: [],
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
        };
    },
    methods: {
        selectedGender(option) {
            this.selGender = option;
        },
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
            if (!this.password) {
                this.errors.password = "Mật khẩu đang trống";
            }
            if (!this.telephone) {
                this.errors.telephone = "Số điện thoại đang trống";
            }
            if (!this.address) {
                this.errors.address = "Địa chỉ đang trống";
            }
            if (!this.role) {
                this.errors.role = "Trang thái đang trống";
            }
            if (!this.birthday) {
                this.errors.birthday = "Ngày sinh đang trống";
            } else {
                axios
                    .post("/api/register", {
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        telephone: this.telephone,
                        gender: this.selGender,
                        address: this.address,
                        birthday: this.birthday,
                        role: this.role,
                    })
                    .then((res) => {
                        console.log(res);
                        swal("Đăng ký!", "thành công", "success");
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
            e.preventDefault();
        },
    },
};
</script>
