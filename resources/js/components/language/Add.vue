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
                            :class="[{ active: $route.name === 'language' }]"
                            :to="{ name: 'language' }"
                            >Danh sách ngôn ngữ</router-link
                        >
                    </li>
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'addLanguage' }]"
                            :to="{ name: 'addLanguage' }"
                            >Thêm ngôn ngữ</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addLanguage' }]"
                    :to="{ name: 'addLanguage' }"
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
                    Thêm ngôn ngữ
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div>
                <div class="card-header py-3">
                    <h6 class="mt-2 font-weight-bold text-primary float-left">
                        Thêm ngôn ngữ
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
                                        >Mã ngôn ngữ:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="ma"
                                        name="ma"
                                        v-model="ma"
                                        placeholder="Mã nngôn ngữ"
                                        :class="{
                                            'is-invalid': errors.ma != null,
                                        }"
                                        pattern="[N][V][0-9]{3}"
                                        required
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.ma != null"
                                    >
                                        {{ errors.ma }}
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Tên ngôn ngữ:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name"
                                        name="name"
                                        v-model="name"
                                        placeholder="Tên ngôn ngữ"
                                        :class="{
                                            'is-invalid': errors.name != null,
                                        }"
                                        required
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.name != null"
                                    >
                                        {{ errors.name }}
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <button
                                        class="btn btn-success text-white"
                                        type="submit"
                                    >
                                        Thêm ngôn ngữ
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
import swal from "sweetalert";
export default {
    data() {
        return {
            ma: "",
            name: "",
            errors: "",
        };
    },
    methods: {
        formSubmit() {
            this.errors = [];
            if (this.ma == "") {
                this.errors.ma = " Chưa nhập mã ngôn ngữ";
            }
            if (this.name == "") {
                this.errors.name = " Chưa nhập ngôn  ngữ";
            } else {
                axios
                    .post(`/api/admin/addlanguage`, {
                        ma: this.ma,
                        name: this.name,
                    })
                    .then((response) => {
                        swal("Thêm thành công!", "", "success");
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
