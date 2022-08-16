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
                                                        $route.name ===
                                                        'trangchu',
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
                                        Sách
                                    </li>
                                </ol>
                            </nav>
                            <div class="box" v-if="this.search != ''">
                                <h1>Kết quả tìm kiếm:</h1>
                                <h4>
                                    {{ this.search }}
                                </h4>
                            </div>
                            <div class="box info-bar">
                                <div class="row">
                                    <div
                                        class="col-md-12 col-lg-4 products-showing"
                                    >
                                        Hiển thị
                                        <strong>{{ paginate }}</strong> trong
                                        <strong>25</strong> sách
                                    </div>
                                    <div
                                        class="col-md-12 col-lg-7 products-number-sort"
                                    >
                                        <form
                                            class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row"
                                        >
                                            <div class="products-number">
                                                <strong>Hiển thị</strong>
                                                <span
                                                    @click="changeVal(8)"
                                                    class="btn btn-sm"
                                                    :class="[
                                                        {
                                                            'btn-primary':
                                                                paginate == 8,
                                                            'btn-outline-secondary':
                                                                paginate != 8,
                                                        },
                                                    ]"
                                                >
                                                    8
                                                </span>
                                                <span
                                                    @click="changeVal(16)"
                                                    class="btn btn-sm"
                                                    :class="[
                                                        {
                                                            'btn-primary':
                                                                paginate == 16,
                                                            'btn-outline-secondary':
                                                                paginate != 16,
                                                        },
                                                    ]"
                                                >
                                                    16</span
                                                ><span
                                                    @click="changeVal(32)"
                                                    class="btn btn-sm"
                                                    :class="[
                                                        {
                                                            'btn-primary':
                                                                paginate == 32,
                                                            'btn-outline-secondary':
                                                                paginate != 32,
                                                        },
                                                    ]"
                                                >
                                                    32</span
                                                ><span>Sách</span>
                                            </div>
                                            <div
                                                class="products-sort-by mt-2 mt-lg-0"
                                            >
                                                <strong>Sort by</strong>
                                                <select
                                                    name="sort-by"
                                                    v-model="filter"
                                                    class="form-control"
                                                >
                                                    <option value="price">
                                                        Giá
                                                    </option>
                                                    <option value="title">
                                                        Tên sách
                                                    </option>
                                                    <option value="sold">
                                                        Bán chạy nhất
                                                    </option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="row products"
                                v-if="books.data.length == 0"
                            >
                                <div style="padding-left: 50px;">
                                    <h1 style="text-align: center">
                                        Không tìm thấy sách bạn đang tìm kiếm
                                    </h1>
                                </div>
                            </div>
                            <div
                                class="row products"
                                v-if="books.data.length != 0"
                            >
                                <div
                                    class="col-lg-3 col-md-4"
                                    v-for="sach in books.data"
                                >
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front">
                                                    <a href="#"
                                                        >{{
                                                            showImage(
                                                                sach.images,
                                                                sach.ma
                                                            )
                                                        }}<img
                                                            :id="sach.ma"
                                                            style="
                                                                height: 337px;
                                                                width: 253px;
                                                            "
                                                            class="img-fluid"
                                                    /></a>
                                                </div>
                                                <div class="back">
                                                    <a href="detail.html"
                                                        >{{
                                                            showImage(
                                                                sach.images,
                                                                sach.ma
                                                            )
                                                        }}<img
                                                            :id="sach.ma"
                                                            style="
                                                                height: 337px;
                                                                width: 253px;
                                                            "
                                                            class="img-fluid"
                                                    /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="invisible"
                                            ><img
                                                src="/img/product3.jpg"
                                                alt=""
                                                class="img-fluid"
                                        /></a>
                                        <div class="text">
                                            <h3>
                                                <a href="detail.html">{{
                                                    sach.title
                                                }}</a>
                                            </h3>
                                            <p class="price">
                                                <del></del>{{ sach.price }} VNĐ
                                            </p>
                                            <p class="buttons">
                                                <span @click="loadpage">
                                                    <router-link
                                                        :to="{
                                                            name: 'detailbook',
                                                            params: {
                                                                id: sach.ma,
                                                            },
                                                        }"
                                                        class="btn btn btn-outline-secondary"
                                                        >Xem chi
                                                        tiết</router-link
                                                    >
                                                </span>
                                                <span
                                                    @click="addToCart(sach.ma)"
                                                    class="btn btn-primary"
                                                >
                                                    <i
                                                        class="fa fa-shopping-cart"
                                                    ></i
                                                    >Thêm vào giỏ
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.text-->
                                    </div>
                                    <!-- /.product            -->
                                </div>

                                <!-- /.products-->
                            </div>
                            <div class="pages">
                                <div class="pages">
                                    <nav
                                        aria-label="Page navigation example"
                                        class="d-flex justify-content-center"
                                    >
                                        <pagination
                                            :data="books"
                                            @pagination-change-page="loadBooks"
                                        ></pagination>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-9-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import EventBus from "../EventBus.vue";
import $ from "jquery";
import axios from "axios";
import swal from "sweetalert";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    data() {
        return {
            carts: [],
            cartadd: {
                ma: "",
                title: "",
                price: "",
                image: "",
                quatity: 1,
            },
            quatity: 1,
            badge: 0,
            totalPrice: 0,
            filter: "price",
            search: this.$route.params.id,
            dataUser: [],
            listParent: [],
            laravelData: {},
            book: [],
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            books: {},
            message: [],
            paginate: 8,
        };
    },
    watch: {
        search: function (value) {
            this.loadBooks();
        },
        filter: function (value) {
            this.loadBooks();
        },
    },
    mounted() {
        this.loadEventBus();
        this.loadBooks();
    },
    methods: {
        changeVal: function (value) {
            this.paginate = value;
            this.loadBooks();
        },
        addToCart: function (ma) {
            // localStorage.removeItem("cart")
            if (localStorage.getItem("cart") != null) {
                this.carts = JSON.parse(localStorage.getItem("cart"));
                this.carts.forEach((value, index) => {
                    if (value.ma == ma) {
                        this.check = false;
                    }
                });
                if (this.check == true) {
                    axios
                        .get("/api/user/detail/" + ma)
                        .then((response) => {
                            this.detailbook = response.data;
                            this.cartadd.ma = this.detailbook.ma;
                            this.cartadd.image = this.detailbook.images;
                            this.cartadd.title = this.detailbook.title;
                            this.cartadd.price = this.detailbook.price;
                            this.cartadd.quatity = 1;
                            this.carts.push(this.cartadd);
                            this.cartadd = {};
                            let parsed = JSON.stringify(this.carts);
                            localStorage.setItem("cart", parsed);
                            this.getCartCount(
                                JSON.parse(localStorage.getItem("cart")).length
                            );
                            swal(
                                "Good job!",
                                "You clicked the button!",
                                "success"
                            );
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
                if (this.check == false) {
                    swal("Lỗi!", "Sản phẩm đã có trong giỏ hàng!");
                    this.check = true;
                }

                console.log(this.carts);
            } else {
                axios
                    .get("/api/user/detail/" + ma)
                    .then((response) => {
                        this.detailbook = response.data;
                        this.cartadd.ma = this.detailbook.ma;
                        this.cartadd.image = this.detailbook.images;
                        this.cartadd.title = this.detailbook.title;
                        this.cartadd.price = this.detailbook.price;
                        this.carts.push(this.cartadd);
                        this.cartadd = {};
                        let parsed = JSON.stringify(this.carts);
                        localStorage.setItem("cart", parsed);
                        this.getCartCount(
                            JSON.parse(localStorage.getItem("cart")).length
                        );
                        swal("Thêm vào giở thành công!", "", "success");
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        loadpage: function () {
            this.$router.go();
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
        loadEventBus: function () {
            EventBus.$on("search", (status) => {
                this.search = status;
            });
            console.log(search);
        },
        loadBooks: function (page = 1) {
            axios
                .get("/api/admin/all_category")
                .then((response) => {
                    this.theloai = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_language")
                .then((response) => {
                    this.ngonngu = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_author")
                .then((response) => {
                    this.tacgia = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_publisher")
                .then((response) => {
                    this.nhaxuatban = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get(
                    "/api/user/book?page=" +
                        page +
                        "&paginate=" +
                        this.paginate +
                        "&q=" +
                        "%" +
                        this.search +
                        "%" +
                        "&order=" +
                        this.filter
                )
                .then((response) => {
                    this.books = response.data;
                    console.log(this.books.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
