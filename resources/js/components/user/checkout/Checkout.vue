<template>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <router-link
                                    :class="[
                                        {
                                            active: $route.name === 'trangchu',
                                        },
                                    ]"
                                    :to="{ name: 'trangchu' }"
                                >
                                    Trang chủ
                                </router-link>
                                <li
                                    aria-current="page"
                                    class="breadcrumb-item active"
                                >
                                    Kiểm tra và thanh toán
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-9">
                        <div class="box">
                            <h1>Thông tin</h1>
                            <div class="content py-3">
                                <div class="row">
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
                                                readonly
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
                                            <label for="address">Street</label>
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
                                            <label for="province"
                                                >Thành phố & Huyện</label
                                            >
                                            <select
                                                id="province"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid':
                                                        errors.province != null,
                                                }"
                                                v-model="province_id"
                                            >
                                                <option :value="null">
                                                    Chọn nhà tỉnh thành:
                                                </option>
                                                <option
                                                    v-for="tamp in province"
                                                    v-bind:value="tamp._name"
                                                >
                                                    {{ tamp._name }}
                                                </option>
                                            </select>
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.province != null"
                                            >
                                                {{ errors.province }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state"
                                                >Quận & Huyện</label
                                            >

                                            <select
                                                :class="{
                                                    'is-invalid':
                                                        errors.state != null,
                                                }"
                                                id="state"
                                                v-model="state_id"
                                                class="form-control"
                                            >
                                                <option :value="null">
                                                    Chọn nhà quận huyện:
                                                </option>
                                                <option
                                                    v-for="tamp in state"
                                                    v-bind:value="tamp._name"
                                                >
                                                    {{ tamp._name }}
                                                </option>
                                            </select>
                                            <div
                                                class="invalid-feedback"
                                                v-if="errors.state != null"
                                            >
                                                {{ errors.state }}
                                            </div>
                                        </div>
                                    </div>

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
                                </div>
                                <!-- /.row-->
                            </div>
                            <div id="basket">
                                <div class="box">
                                    <h1>Thông tin sản phẩm</h1>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Sách</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th colspan="2">
                                                        Tổng cộng
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-if="carts != null"
                                                    v-for="(
                                                        tamp, index
                                                    ) in carts"
                                                >
                                                    <td
                                                        style="max-width: 100px"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'detailbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                showImage(
                                                                    tamp.image,
                                                                    tamp.ma
                                                                )
                                                            }}<img
                                                                :id="tamp.ma"
                                                        /></router-link>
                                                    </td>
                                                    <td
                                                        style="max-width: 150px"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'detailbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                tamp.title
                                                            }}</router-link
                                                        >
                                                    </td>
                                                    <td>
                                                        {{ tamp.quatity }}
                                                    </td>
                                                    <td>
                                                        {{
                                                            formatPrice(
                                                                tamp.price
                                                            )
                                                        }}
                                                        VNĐ
                                                    </td>
                                                    <td
                                                        :id="
                                                            tamp.ma + 'tinhTong'
                                                        "
                                                        colspan="2"
                                                    >
                                                        {{
                                                        formatPrice(tinhTong(
                                                            tamp.ma,
                                                            tamp.price,
                                                            tamp.quatity
                                                        )),

                                                        }}
                                                        VNĐ
                                                    </td>
                                                    <td>
                                                        <button
                                                            @click="
                                                                xoa(
                                                                    tamp.ma,
                                                                    index
                                                                )
                                                            "
                                                            class="button button1"
                                                        >
                                                            <i
                                                                class="fa fa-trash-o"
                                                            ></i>
                                                        </button>
                                                    </td>
                                                    {{
                                                        tongTatCa()
                                                    }}
                                                </tr>
                                                <tr v-if="carts == null">
                                                    <td>
                                                        <h1>
                                                            Giỏ hàng đang
                                                            trống....
                                                        </h1>
                                                    </td>
                                                </tr>
                                                <tr v-if="carts.length == 0">
                                                    <td>
                                                        <h1>
                                                            Giỏ hàng đang
                                                            trống....
                                                        </h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">
                                                        Tổng cộng:
                                                    </th>
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
                            <div
                                class="box-footer d-flex justify-content-between"
                            >
                                <router-link
                                    :class="[
                                        {
                                            active: $route.name === 'allbook',
                                        },
                                    ]"
                                    :to="{ name: 'allbook' }"
                                    class="btn btn-outline-secondary"
                                    ><i class="fa fa-chevron-left"></i> Tiếp tục
                                    mua</router-link
                                >
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    @click="checkForm"
                                >
                                    Đặt hàng<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div id="order-summary" class="card">
                            <div class="card-header">
                                <h3 class="mt-4 mb-4">Tổng đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">
                                    Chi phí vận chuyển và chi phí bổ sung được
                                    tính dựa trên các giá trị bạn đã nhập.
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    Tổng giá trị sách:
                                                </td>
                                                <th>
                                                    {{ formatPrice(total) }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="1">Phí:</td>
                                                <th>
                                                    {{
                                                        formatPrice(total * tax)
                                                    }}
                                                </th>
                                            </tr>
                                            <tr class="total">
                                                <td colspan="1">Tông cộng:</td>
                                                <th>{{ allcost() }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-->
                </div>
                <!-- /.col-lg-9-->

                <!-- /.col-lg-3-->
            </div>
        </div>
    </div>
</template>
<script>
import $ from "jquery";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
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
            province: null,
            state: null,
            dataUser: [],
            search: "",
            book: null,
            books: null,
            message: [],
            paginate: 6,
            carts: null,
            total: 0,
            tax: 0.05,
            advisebook: [],
            firstname: null,
            lastname: null,
            address: null,
            telephone: null,
            email: null,
            province_id: null,
            state_id: null,
            check: "",
        };
    },
    watch: {
        search: function (value) {
            this.loadBooks();
        },
        province_id: function (value) {
            this.loadState();
        },
    },
    props: {
        getCartCount: Function,
    },
    mounted() {
        this.loadCart();
        this.loadAddress();
        this.getUser();
        this.loadState();
    },
    methods: {
        loadState: function () {
            axios
                .get("/api/user/getstate?id=" + this.province_id)
                .then((response) => {
                    this.state = response.data;
                    console.log(this.state);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadAddress: function () {
            axios
                .get("/api/user/getprovince")
                .then((response) => {
                    this.province = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/user/getstate")
                .then((response) => {
                    this.state = response.data;
                    console.log(this.state);
                })
                .catch(function (error) {
                    console.log(error);
                });
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
                console.log(
                    this.address +
                        ", " +
                        this.state_id +
                        ", " +
                        this.province_id
                );
                axios
                    .post(`/api/user/order`, {
                        order_number: tamp.toString(),
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        total: this.total,
                        user_id: this.dataUser.user.id,
                        page_number: this.page_number,
                        address:
                            this.address +
                            ", " +
                            this.state_id +
                            ", " +
                            this.province_id,
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
                                .then((response) => {
                                    this.checkSoLuong(response.data);
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            
            e.preventDefault();
        },
        callAlert: function () {
            if (this.check == "Số lượng không đủ") {
                swal("Lỗi!", "Sản phẩm không đủ để đặt hàng!");
            }
            if (this.check == "") {
                // localStorage.removeItem("cart");
                swal("Đặt hàng thành công!", "", "success");
            }
        },
        checkSoLuong: function (value) {
            if (value == "Số lượng không đủ") {
                this.check = "Số lượng không đủ";
            }
            this.callAlert();
        },
        getUser: function () {
            axios
                .get("/api/profile", {
                    headers: {
                        Authorization: `Bearer ${localStorage.usertoken}`,
                    },
                })
                .then((response) => {
                    this.dataUser = response.data;
                    this.email = this.dataUser.user["email"];
                    console.log(this.dataUser);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        allcost: function () {
            return this.formatPrice(this.total + this.total * this.tax);
        },
        tongTatCa: function () {
            var tamp = 0;
            this.carts.forEach((value, index) => {
                // console.log(parseInt(value.quatity) * parseInt(value.price));
                tamp =
                    parseInt(tamp) +
                    parseInt(value.quatity) * parseInt(value.price);
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
        xoa: function (ma, index) {
            this.carts.splice(index, 1);
            if (this.carts.length == 0) {
                this.total = 0;
            }
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem("cart", parsed);
            this.loadCart();
            this.getCartCount(JSON.parse(localStorage.getItem("cart")).length);
        },
        loadCart: function () {
            if (localStorage.getItem("cart") != null) {
                this.carts = JSON.parse(localStorage.getItem("cart"));
            }
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
                    // Handle any errors
                });
        },
    },
};
</script>
