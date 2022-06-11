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
                            :class="[{ active: $route.name === 'author' }]"
                            :to="{ name: 'author' }"
                            >Danh sách tác giả</router-link
                        >
                    </li>
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'addAuthor' }]"
                            :to="{ name: 'addAuthor' }"
                            >Thêm tác giả</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addAuthor' }]"
                    :to="{ name: 'addAuthor' }"
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
                    Thêm tác giả
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div>
                <div class="card-header py-3">
                    <h6 class="mt-2 font-weight-bold text-primary float-left">
                        Thêm tác giả
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form
                                class="needs-validation"
                                @submit.prevent="formSubmit"
                                novalidate
                            >
                                <div class="form-group mb-4">
                                    <label for="makh" class="col-form-label"
                                        >Mã tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="ma"
                                        name="ma"
                                        v-model="ma"
                                        placeholder="Mã tác giả"
                                        value=""
                                        pattern="[N][V][0-9]{3}"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Đang trống hoặc mã không đúng (ví dụ:
                                        NV001)
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Họ tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="firstname"
                                        name="firstname"
                                        v-model="firstname"
                                        placeholder="Họ tác giả"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Tên tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="lastname"
                                        name="lastname"
                                        v-model="lastname"
                                        placeholder="Tên tác giả"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Mô tả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="biography"
                                        name="biography"
                                        v-model="biography"
                                        placeholder="Mô tả"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <button
                                        class="btn btn-success text-white"
                                        type="submit"
                                    >
                                        Thêm tác giả
                                    </button>
                                    <button
                                        type="reset"
                                        class="btn btn-warning text-white"
                                    >
                                        Xoá
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import swal from 'sweetalert';
export default {
    data() {
        return {
            ma: '',
            firstname: '',
            lastname: '',
            biography: '',
        };
    },
    methods: {
        formSubmit() {

            axios
                .post(`api/addauthor`, {
                    ma: this.ma, 
                    firstname: this.firstname, 
                    lastname: this.lastname, 
                    biography: this.biography})
                .then( (response)  => {
                    swal("Thêm thành công!", "", "success");

                })
                .catch(function (error) {
                    onsole.log(error);
                });
        },
    },
};
</script>
