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
                            :class="[{ active: $route.name === 'order' }]"
                            :to="{ name: 'order' }"
                            >Đơn đặt hàng</router-link
                        >
                    </li>
                </ol>
            </nav>
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
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Tổng đơn</th>
                                <th>Ngày đặt</th>
                                <th>Ngày cập nhật</th>
                                <th>Trạng thái</th>
                                <th>Lý do hủy</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="tamp in orders.data"
                                v-blind:key="tamp.order_number"
                                :key="tamp.order_number"
                            >
                                <td>{{ tamp.order_number }}</td>

                                <td>
                                    {{ tamp.firstname + " " + tamp.lastname }}
                                </td>
                                <td>{{ tamp.address }}</td>
                                <td>{{ tamp.telephone }}</td>
                                <td>{{ tamp.email }}</td>
                                <td>{{ formatPrice(tamp.total) }} VNĐ</td>
                                <td>{{ format_date(tamp.created_at) }}</td>
                                <td>{{ format_date(tamp.updated_at) }}</td>
                                <td>
                                    <span
                                        v-if="tamp.status == 'new'"
                                        class="fw-bold text-success"
                                        >Đang xử lý</span
                                    >
                                    <span
                                        v-if="tamp.status == 'accepted'"
                                        class="fw-bold text-success"
                                        >Đã xác nhận đơn hàng</span
                                    >
                                    <span
                                        v-if="tamp.status == 'delivering'"
                                        class="fw-bold text-warning"
                                        >Đang vận chuyển</span
                                    >
                                    <span
                                        v-if="tamp.status == 'cancel'"
                                        class="fw-bold text-danger"
                                        >Đã hủy</span
                                    >
                                    <span
                                        v-if="tamp.status == 'done'"
                                        class="fw-bold text-success"
                                        >Đã giao hàng</span
                                    >
                                </td>
                                <td>
                                    <span
                                        v-if="tamp.status == 'cancel'"
                                        >{{tamp.ly_do_huy}}</span
                                    >
                                    <span
                                        v-if="tamp.status != 'cancel'"
                                        ></span
                                    >
                                </td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <b-button
                                            @click="
                                                showEditOrders(
                                                    tamp.order_number
                                                )
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
                    :data="orders"
                    @pagination-change-page="loadOrders"
                ></pagination>
            </div>
        </div>
        <!-- Modal -->
        <b-modal ref="my-modal" hide-footer title="Chi tiết đơn hàng" size="xl">
            <div id="basket">
                <div class="box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Sách</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th colspan="2">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="tamp in orderDetails">
                                    <td style="max-width: 100px">
                                        {{ showImage(tamp.images, tamp.ma)
                                        }}<img
                                            :id="tamp.ma"
                                            style="
                                                max-height: 100px;
                                                max-width: 50px;
                                            "
                                        />
                                    </td>
                                    <td>
                                        {{ tamp.name_product }}
                                    </td>
                                    <td>
                                        {{ tamp.quantity }}
                                    </td>
                                    <td>
                                        {{ formatPrice(tamp.price) }}
                                        VNĐ
                                    </td>
                                    <td :id="tamp.ma + 'tinhTong'" colspan="2">
                                        {{
                                            formatPrice(tinhTong(
                                                tamp.ma,
                                                tamp.price,
                                                tamp.quantity
                                            )),

                                        }}
                                        VNĐ
                                    </td>
                                    {{
                                        tongTatCa()
                                    }}
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Tổng cộng:</th>
                                    <th colspan="2">
                                        {{ formatPrice(total) }}
                                        VNĐ
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <b-button
                style="float: right"
                variant="outline-danger"
                @click="hideModal('my-modal')"
                >Đóng</b-button
            >
        </b-modal>
        <b-modal
            ref="editOrder"
            hide-footer
            title="Chỉnh sửa đơn hàng"
            size="xl"
        >
            <h1>Thông tin đơn hàng</h1>
            <div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div><p class="inDam">Mã đơn hàng:</p> {{ order.order_number }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div><p class="inDam">Họ và tên:</p> {{ order.firstname + " " +  order.lastname }}</div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div><p class="inDam">Email:</p> {{ order.email }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           <div><p class="inDam">Địa chỉ:</p> {{ order.address }}</div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div><p class="inDam">Số điện thoại:</p> {{ order.telephone }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="inDam">Trạng thái:</label>
                            <select
                                class="form-select"
                                v-model="order.status"
                                :class="{
                                    'is-invalid': errors.stautus != null,
                                }"
                            >
                                <option :value="'new'">Đang xử lý</option>
                                <option :value="'accepted'">
                                    Đã xác nhận đơn
                                </option>
                                <option :value="'delivering'">
                                    Đang vận chuyển
                                </option>
                                <option :value="'cancel'">Đã hủy</option>
                            </select>
                            <div
                                class="invalid-feedback"
                                v-if="errors.status != null"
                            >
                                {{ errors.status }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div id="basket">
                        <div class="box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Sách</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th colspan="2">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="tamp in orderDetails">
                                            <td style="max-width: 100px">
                                                {{
                                                    showImage(
                                                        tamp.images,
                                                        tamp.ma
                                                    )
                                                }}<img
                                                    :id="tamp.ma"
                                                    style="
                                                        max-height: 100px;
                                                        max-width: 50px;
                                                    "
                                                />
                                            </td>
                                            <td>
                                                {{ tamp.name_product }}
                                            </td>
                                            <td>
                                                {{ tamp.quantity }}
                                            </td>
                                            <td>
                                                {{ formatPrice(tamp.price) }}
                                                VNĐ
                                            </td>
                                            <td
                                                :id="tamp.ma + 'tinhTong'"
                                                colspan="2"
                                            >
                                                {{
                                            formatPrice(tinhTong(
                                                tamp.ma,
                                                tamp.price,
                                                tamp.quantity
                                            )),

                                                }}
                                                VNĐ
                                            </td>
                                            {{
                                                tongTatCa()
                                            }}
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Tổng cộng:</th>
                                            <th colspan="2">
                                                {{ formatPrice(total) }}
                                                VNĐ
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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
    </div>
</template>
<script>
import "bootstrap";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import swal from "sweetalert";
import $ from "jquery";
import moment from "moment";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    data: function () {
        return {
            laravelData: {},
            order: {
                order_number: null,
                lastname: null,
                firstname: null,
                total: 0,
                status: null,
                created_at: null,
                updated_at: null,
                address: null,
                email: null,
                telephone: null,
            },
            province: null,
            state: null,
            orders: {},
            orderDetails: null,
            message: [],
            paginate: 10,
            ma: "",
            search: "",
            errors: [],
        };
    },
    watch: {
        paginate: function (value) {
            this.loadOrders();
        },
        search: function (value) {
            this.loadOrders();
        },
        checked: function (value) {
            this.url = "/api/students/export/" + this.checked;
        },
    },
    mounted() {
        this.loadOrders();
        this.loadState();
    },
    methods: {
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

            if (!this.order.firstname) {
                this.errors.firstname = "Họ đang trống";
            }
            if (!this.order.lastname) {
                this.errors.lastname = "Tên đang trống";
            }
            if (!this.order.email) {
                this.errors.email = "Email đang trống";
            }
            if (!this.order.telephone) {
                this.errors.telephone = "Số điện thoại đang trống";
            }
            if (!this.order.address) {
                this.errors.address = "Địa chỉ đang trống";
            }
            if (!this.order.status) {
                this.errors.status = "Trang thái đang trống";
            } else {
                axios
                    .post("/api/admin/editorder/" + this.order.order_number, {
                        firstname: this.order.firstname,
                        lastname: this.order.lastname,
                        email: this.order.email,
                        total: this.order.total,
                        address: this.order.address,
                        telephone: this.order.telephone,
                        status: this.order.status,
                    })
                    .then((response) => {
                        swal("Cập nhật thành công!", "", "success");
                        this.loadOrders();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            e.preventDefault();
        },
        tongTatCa: function () {
            var tamp = 0;
            this.orderDetails.forEach((value, index) => {
                tamp =
                    parseInt(tamp) +
                    parseInt(value.quantity) * parseInt(value.price);
            });
            this.total = tamp;
        },
        tinhTong: function (id, gia, quantity) {
            if (quantity < 1) {
                quantity = 0;
                return quantity * gia;
            }
            if (quantity > 100) {
                quantity = 100;
                return quantity * gia;
            }

            return quantity * gia;
        },
        showImage: function (fileName, id) {
            const storage = getStorage();
            getDownloadURL(ref(storage, fileName))
                .then((url) => {
                    // `url` is the download URL for 'images/stars.jpg'

                    // This can be downloaded directly:
                    const xhr = new XMLHttpRequest();
                    xhr.responseType = "blob";
                    xhr.onload = (event) => {
                        const blob = xhr.response;
                    };
                    xhr.open("GET", url);
                    xhr.send();
                    // Or inserted into an <img> element
                    const img = document.getElementById(id);
                    img.setAttribute("src", url);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        showDetail: function (value) {
            axios
                .get("/api/user/getdetailsorder/" + value)
                .then((response) => {
                    this.orderDetails = response.data.data;
                    console.log(this.orderDetails);
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
            this.loadOrders();
        },
        format_date: function (value) {
            if (value) {
                return moment(String(value)).format("MMM Do YY");
            }
        },
        formatPrice: function (value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        loadOrders: function (page = 1) {
            axios
                .get(
                    "/api/admin/order?page=" +
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
                    this.orders = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showEditOrders: function (value) {
            axios
                .get("/api/user/getdetailsorder/" + value)
                .then((response) => {
                    this.orderDetails = response.data.data;
                    console.log(this.orderDetails);
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/findorder/" + value)
                .then((response) => {
                    this.order = response.data;
                    console.log(this.order);
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.showModel("editOrder");
        },
        closeEditPublishers: function () {
            this.modal = "edit";
            this.product = product;
            $("#product").modal("show");
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
