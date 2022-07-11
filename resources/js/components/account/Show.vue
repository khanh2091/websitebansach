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
                            >Tài khoản</router-link
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
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary float-left">
                    Danh sách tài khoản
                </h6>
            </div>
            <div
                class="d-flex justify-content-between align-content-center mb-2"
            >
                <div class="d-flex">
                    <div>
                        <div
                            class="d-flex align-items-center ml-4"
                            style="padding: 20px"
                        >
                            <select
                                id="paginate"
                                v-model="paginate"
                                class="form-control form-control-sm"
                            >
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            <label
                                for="paginate"
                                class="text-nowrap mr-2 mb-0"
                                style="margin-left: 10px"
                            >
                                tài khoản trên trang</label
                            >
                        </div>
                    </div>

                    <div>
                        <div class="dropdown ml-4">
                            <!-- <button
                                v-if="checked.length > 0"
                                class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown"
                            >
                                With Checked ({{ checked.length }})
                            </button> -->
                            <div class="dropdown-menu">
                                <!-- <a
                                    href="#"
                                    onclick="confirm('Are you sure you wanna delete this Record?') || event.stopImmediatePropagation()"
                                    class="dropdown-item"
                                    type="button"
                                    @click.prevent="deleteRecords"
                                >
                                    Delete
                                </a>

                                <a
                                    :href="url"
                                    class="dropdown-item"
                                    type="button"
                                >
                                    Export
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding: 20px">
                    <input
                        v-model="search"
                        type="search"
                        class="form-control"
                        placeholder="Tìm kiếm..."
                    />
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        width="100%"
                        cellspacing="0"
                        id="datatable"
                    >
                        <thead class="thead-light">
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Chức vụ</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="tamp in accounts.data"
                                v-blind:key="tamp.email"
                                :key="tamp.email"
                            >
                                <td>
                                    {{ tamp.firstname + " " + tamp.lastname }}
                                </td>
                                <td>{{ tamp.address }}</td>
                                <td>{{ format_date(tamp.birthday) }}</td>
                                <td>{{ tamp.telephone }}</td>
                                <td>{{ tamp.email }}</td>
                                <td v-if="tamp.role == 'employee'">
                                    Nhân viên
                                </td>
                                <td v-if="tamp.role == 'admin'">
                                    Quản trị viên
                                </td>
                                <td v-if="tamp.role == 'customer'">
                                    Khách hàng
                                </td>
                                <td>{{ format_date(tamp.created_at) }}</td>
                                <td>{{ format_date(tamp.updated_at) }}</td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <b-button
                                            @click="showChangePass(tamp.email)"
                                            class="btn btn-primary btn-sm float-left mx-2 btn-circle text-white"
                                            data-toggle="tooltip"
                                            title="Đổi mật khẩu"
                                            data-placement="bottom"
                                            ><i class="fas fa-info-circle"></i
                                        ></b-button>
                                        <b-button
                                            @click="
                                                showEditAccounts(tamp.email)
                                            "
                                            type="button"
                                            class="btn btn-warning btn-sm float-left mx-2 btn-circle text-white"
                                            data-toggle="tooltip"
                                            title="Sửa"
                                            data-placement="bottom"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </b-button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination
                    :data="accounts"
                    @pagination-change-page="loadAccounts"
                ></pagination>
            </div>
        </div>
        <b-modal
            ref="editOrder"
            hide-footer
            title="Chỉnh sửa tài khoản"
            size="xl"
        >
            <h1>Thông tin tài khoản</h1>
            <div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Họ: </label>
                            <input
                                id="firstname"
                                type="text"
                                :class="{
                                    'is-invalid': errors.firstname != null,
                                }"
                                class="form-control"
                                v-model="account.firstname"
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
                            <label for="lastname">Tên lót & Tên: </label>
                            <input
                                id="lastname"
                                type="text"
                                :class="{
                                    'is-invalid': errors.lastname != null,
                                }"
                                class="form-control"
                                v-model="account.lastname"
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
                            <label for="company">Ngày sinh:</label>
                            <br />
                            <date-picker
                                :class="{
                                    'is-invalid': errors.birthday != null,
                                }"
                                v-model="account.birthday"
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
                                    v-for="(gender, index) in genders"
                                    :key="index"
                                >
                                    <input
                                        type="radio"
                                        :value="gender.code"
                                        v-model="account.gender"
                                        @click="selectedGender(account.gender)"
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
                                    'is-invalid': errors.email != null,
                                }"
                                class="form-control"
                                v-model="account.email"
                                readonly
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
                                    'is-invalid': errors.address != null,
                                }"
                                id="address"
                                type="text"
                                class="form-control"
                                v-model="account.address"
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
                            <label for="telephone">Số điện thoại</label>
                            <input
                                id="telephone"
                                type="text"
                                :class="{
                                    'is-invalid': errors.telephone != null,
                                }"
                                class="form-control"
                                v-model="account.telephone"
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
                                v-model="account.role"
                                :class="{
                                    'is-invalid': errors.role != null,
                                }"
                            >
                                <option :value="'employee'">Nhân viên</option>
                                <option :value="'customer'">Khách hàng</option>
                                <option :value="'admin'">Quản trị viên</option>
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
            </div>

            <b-button
                style="float: right; margin-top: 20px"
                variant="outline-danger"
                @click="hideModal('editOrder')"
                >Đóng</b-button
            >
            <b-button
                style="float: right; margin-top: 20px; margin-right: 20px"
                variant="outline-warning"
                @click="checkForm"
                >Cập nhật</b-button
            >
        </b-modal>
        <b-modal
            ref="showChangePass"
            hide-footer
            title="Đổi mật khẩu"
            size="sm"
        >
            <div class="row" style="margin-top: 20px">
                
                    <label for="company">Mật khẩu mới:</label>
                    <input
                        id="email"
                        type="text"
                        :class="{
                            'is-invalid': errorPass != null,
                        }"
                        class="form-control"
                        v-model="password"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="errorPass != null"
                    >
                        {{ errorPass.password }}
                    </div>

            </div>
            <b-button
                style="float: right; margin-top: 20px"
                variant="outline-danger"
                @click="hideModal('showChangePass')"
                >Đóng</b-button
            >
            <b-button
                style="float: right; margin-top: 20px; margin-right: 20px"
                variant="outline-warning"
                @click="checkFormPas"
                >Cập nhật</b-button
            >
        </b-modal>
    </div>
</template>
<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import "bootstrap";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import swal from "sweetalert";
import $ from "jquery";
import moment from "moment";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    components: { DatePicker },
    data: function () {
        return {
            emailchange: null,
            laravelData: {},
            account: {},
            province: null,
            state: null,
            accounts: {},
            accountDetail: null,
            message: [],
            paginate: 10,
            ma: "",
            search: "",
            password: null,
            errorPass: null,
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
    watch: {
        paginate: function (value) {
            this.loadAccounts();
        },
        search: function (value) {
            this.loadAccounts();
        },
        checked: function (value) {
            this.url = "/api/students/export/" + this.checked;
        },
    },
    mounted() {
        this.loadAccounts();
        this.loadState();
    },
    methods: {
        showChangePass: function (email) {
            this.emailchange = null;
            this.emailchange = email;
            this.showModel("showChangePass");
        },
        checkFormPas: function () {
            this.errorPass = null;
            if (this.password == null) {
                this.errorPass = "Chưa điền password";
            } else {
                axios
                    .get("/api/changePassword/" + this.emailchange)
                    .then((response) => {
                        swal("Đổi mật khẩu!", "Thành công", "success");
                        this.hideModal('showChangePass')
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        selectedGender(option) {
            this.selGender = option;
        },
        loadState: function () {
            axios
                .get("/api/user/getstate?id=" + this.province_id)
                .then((response) => {
                    this.state = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        checkForm: function (e) {
            this.errors = [];

            if (!this.account.firstname) {
                this.errors.firstname = "Họ đang trống";
            }
            if (!this.account.lastname) {
                this.errors.lastname = "Tên đang trống";
            }
            if (!this.account.email) {
                this.errors.email = "Email đang trống";
            }
            if (!this.account.telephone) {
                this.errors.telephone = "Số điện thoại đang trống";
            }
            if (!this.account.address) {
                this.errors.address = "Địa chỉ đang trống";
            }
            if (!this.account.role) {
                this.errors.role = "Trang thái đang trống";
            }
            if (!this.account.birthday) {
                this.errors.birthday = "Ngày sinh đang trống";
            } else {
                axios
                    .post("/api/admin/editAccount/" + this.account.email, {
                        firstname: this.account.firstname,
                        lastname: this.account.lastname,
                        address: this.account.address,
                        telephone: this.account.telephone,
                        role: this.account.role,
                        gender: this.account.gender,
                        birthday: this.account.birthday,
                    })
                    .then((response) => {
                        swal("Cập nhật thành công!", "", "success");
                        this.loadAccounts();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            e.preventDefault();
        },
        showDetail: function (value) {
            axios
                .get("/api/user/getdetailsorder/" + value)
                .then((response) => {
                    this.accountDetail = response.data.data;
                    console.log(this.accountDetail);
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.showModel("my-modal");
        },
        showModel(value) {
            this.$refs[value].show();
        },
        hideModal(value) {
            this.$refs[value].hide();
            this.loadAccounts();
        },
        format_date: function (value) {
            if (value) {
                return moment(String(value)).format("MMM Do YY");
            }
        },
        loadAccounts: function (page = 1) {
            axios
                .get(
                    "/api/admin/account?page=" +
                        page +
                        "&paginate=" +
                        this.paginate +
                        "&q=" +
                        "%" +
                        this.search +
                        "%"
                )
                .then((response) => {
                    // this.laravelData = response.data;
                    this.accounts = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showEditAccounts: function (value) {
            axios
                .get("/api/admin/findAccount/" + value)
                .then((response) => {
                    this.account = response.data;
                    console.log(this.account);
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.showModel("editOrder");
        },

        checkFormValidity() {
            const valid = this.$refs.form.checkValidity();
            this.nameState = valid;
            return valid;
        },
        resetModal() {
            this.nameState = null;
        },
        handleOk(bvModalEvent) {
            // Prevent modal from closing
            bvModalEvent.preventDefault();
            // Trigger submit handler
            this.handleSubmit();
        },
        handleSubmit() {
            if (!this.checkFormValidity()) {
                return;
            }
            // Push the name to submitted names
            // this.submittedNames.push(this.name);
            // Hide the modal manually
            this.$nextTick(() => {
                this.editLanguages();
                this.$bvModal.hide("modal-prevent-closing");
            });
        },
    },
};
</script>
