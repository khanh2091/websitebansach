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
                                    Giỏ hàng
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div id="basket" class="col-lg-9">
                        <div class="box">
                            <h1>Giỏ hàng</h1>
                            <p class="text-muted">
                                Giỏ hàng đâng có
                                <span v-if="carts != null">
                                    {{ carts.length }}</span
                                >
                                <span v-if="carts == null"> 0 </span> sách.
                            </p>
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
                                        <tr
                                            v-if="carts != null"
                                            v-for="(tamp, index) in carts"
                                        >
                                            <td style="max-width: 100px">
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
                                                    }}<img :id="tamp.ma"
                                                /></router-link>
                                            </td>
                                            <td style="max-width: 150px">
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
                                            <td
                                                @click="
                                                    updateQuantity(
                                                        tamp.quatity,
                                                        tamp.ma
                                                    )
                                                "
                                            >
                                                <input
                                                    :id="tamp.ma"
                                                    v-model="tamp.quatity"
                                                    type="number"
                                                    min="1"
                                                    max="100"
                                                    style="width: 80px"
                                                    class="form-control"
                                                />
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
                                                            tamp.quatity
                                                        )),

                                                }}
                                                VNĐ
                                            </td>
                                            <td>
                                                <button
                                                    @click="xoa(tamp.ma, index)"
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
                                                <h1>Giỏ hàng đang trống....</h1>
                                            </td>
                                        </tr>
                                        <tr v-if="carts.length == 0">
                                            <td>
                                                <h1>Giỏ hàng đang trống....</h1>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Tổng cộng:</th>
                                            <th colspan="2">
                                                {{ formatPrice(total) }} VNĐ
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div
                                class="box-footer d-flex justify-content-between flex-column flex-lg-row"
                            >
                                <div class="left">
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'allbook',
                                            },
                                        ]"
                                        :to="{ name: 'allbook' }"
                                        class="btn btn-outline-secondary"
                                        ><i class="fa fa-chevron-left"></i> Tiếp
                                        tục mua</router-link
                                    >
                                </div>
                                <div class="right">
                                    <button
                                        @click="refreshCart()"
                                        class="btn btn-outline-secondary"
                                    >
                                        <i class="fa fa-refresh"></i> Cập nhật
                                        giỏ hàng
                                    </button>
                                    <button
                                        @click="checkout"
                                        class="btn btn-primary"
                                    >
                                        Thanh toán
                                        <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row same-height-row">
                            <div class="col-lg-3 col-md-6">
                                <div class="box same-height">
                                    <h3>
                                        Bạn cũng có thể thích những cuốn sách
                                        này
                                    </h3>
                                </div>
                            </div>
                            <div
                                class="col-md-3 col-sm-6"
                                v-for="tamp in advisebook"
                            >
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        showImageCart(
                                                            tamp.images,
                                                            tamp.ma
                                                        )
                                                    }}<img
                                                        :id="'hinh' + tamp.ma"
                                                        style="
                                                            height: 242px;
                                                            width: 181px;
                                                        "
                                                        class="img-fluid"
                                                /></router-link>
                                            </div>
                                            <div class="back">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        showImageCart(
                                                            tamp.images,
                                                            tamp.ma
                                                        )
                                                    }}<img
                                                        :id="'hinh' + tamp.ma"
                                                        style="
                                                            height: 242px;
                                                            width: 181px;
                                                        "
                                                        class="img-fluid"
                                                /></router-link>
                                            </div>
                                        </div>
                                    </div>
                                    <router-link
                                        :to="{
                                            name: 'detailbook',
                                            params: { id: tamp.ma },
                                        }"
                                        class="invisible"
                                        ><img
                                            src="/img/product2_2.jpg"
                                            class="img-fluid"
                                    /></router-link>
                                    <div class="text">
                                        <h3>{{ tamp.title }}</h3>
                                        <p class="price">
                                            {{ formatPrice(tamp.price) }} VNĐ
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div id="order-summary" class="box">
                            <div class="box-header">
                                <h3 class="mb-0">Tổng đơn hàng</h3>
                            </div>
                            <p class="text-muted">
                                Chi phí vận chuyển và chi phí bổ sung được tính
                                dựa trên các giá trị bạn đã nhập.
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="1">
                                                Tổng giá trị sách:
                                            </td>
                                            <th>{{ formatPrice(total) }}</th>
                                        </tr>
                                        <tr>
                                            <td colspan="1">Phí:</td>
                                            <th>
                                                {{ formatPrice(total * tax) }}
                                            </th>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="1">Total:</td>
                                            <th>{{ allcost() }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h4 class="mb-0">Mã giảm giá</h4>
                            </div>
                            <p class="text-muted">
                                Nếu bạn có mã phiếu giảm giá, vui lòng nhập mã
                                đó vào ô bên dưới.
                            </p>
                            <form>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                    /><span class="input-group-append">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-gift"></i></button
                                    ></span>
                                </div>
                                <!-- /input-group-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $ from "jquery";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
import axios from "axios";
export default {
    data() {
        return {
            search: "",
            book: null,
            books: null,
            message: [],
            paginate: 6,
            carts: null,
            total: 0,
            tax: 0.05,
            advisebook: [],
        };
    },
    watch: {
        search: function (value) {
            this.loadBooks();
        },
    },
    props: {
        getCartCount: Function,
    },
    mounted() {
        this.loadCart();
        this.loadAdvise();
    },
    methods: {
        checkout: function () {
            if (localStorage.getItem("usertoken")) {
                this.$router.push({ name: "checkout" });
            } else {
                swal({
                    title: "Chưa đăng nhập?",
                    text: "Hãy đăng nhập để đặt hàng!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        this.$router.push({ name: "register" });
                    }
                });
            }
        },
        loadAdvise: function () {
            axios
                .get("/api/user/getnewbook")
                .then((response) => {
                    this.advisebook = response.data;
                    console.log(this.advisebook);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        allcost: function () {
            return this.formatPrice(this.total + this.total * this.tax);
        },
        refreshCart: function () {
            this.loadCart();
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
        updateQuantity: function (quantity, ma) {
            const objIndex = this.carts.findIndex((obj) => obj.ma == ma);
            this.carts[objIndex].quatity = quantity;
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem("cart", parsed);
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
        showImageCart: function (fileName, id) {
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
                    const img = document.getElementById("hinh" + id);
                    img.setAttribute("src", url);
                })
                .catch((error) => {
                    // Handle any errors
                });
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
