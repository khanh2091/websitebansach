<template>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" @click="loadpage">
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
                                    Sách
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Danh mục</h3>
                            </div>
                            <div class="card-body">
                                <ul
                                    class="nav nav-pills flex-column category-menu"
                                >
                                    <li>
                                        <a href="#" class="nav-link"
                                            >Thể loại
                                            <span
                                                class="badge badge-secondary"
                                                >{{ theloai.length }}</span
                                            ></a
                                        >
                                        <ul
                                            class="list-unstyled"
                                            v-for="tamp in theloai"
                                        >
                                            <li @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        tamp.title
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link"
                                            >Tác giả
                                            <span class="badge badge-light">{{
                                                tacgia.length
                                            }}</span></a
                                        >
                                        <ul
                                            class="list-unstyled"
                                            v-for="tamp in tacgia"
                                        >
                                            <li @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        tamp.firstname +
                                                        " " +
                                                        tamp.lastname
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link"
                                            >Ngôn ngữ
                                            <span
                                                class="badge badge-secondary"
                                                >{{ ngonngu.length }}</span
                                            ></a
                                        >
                                        <ul
                                            class="list-unstyled"
                                            v-for="tamp in ngonngu"
                                        >
                                            <li @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        tamp.name
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link"
                                            >Nhà xuất bản
                                            <span
                                                class="badge badge-secondary"
                                                >{{ nhaxuatban.length }}</span
                                            ></a
                                        >
                                        <ul
                                            class="list-unstyled"
                                            v-for="tamp in nhaxuatban"
                                        >
                                            <li @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    >{{
                                                        tamp.name
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- *** MENUS AND FILTERS END ***-->
                    </div>
                    <div class="col-lg-9">
                        <div class="box" v-if="idloc != ''">
                            <h1 v-for="tamp in ngonngu" v-if="tamp.ma == idloc">
                                Sách có ngôn ngữ: {{ tamp.name }}
                            </h1>
                            <h1 v-for="tamp in theloai" v-if="tamp.ma == idloc">
                                Sách thuộc thể loại: {{ tamp.title }}
                            </h1>
                            <h1
                                v-for="tamp in nhaxuatban"
                                v-if="tamp.ma == idloc"
                            >
                                Sách thuộc nhà xuất bản: {{ tamp.name }}
                            </h1>
                            <h1 v-for="tamp in tacgia" v-if="tamp.ma == idloc">
                                Sách thuộc tác giả:
                                {{ tamp.firstname + " " + tamp.lastname }}
                            </h1>
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
                                                @click="changeVal(6)"
                                                class="btn btn-sm"
                                                :class="[
                                                    {
                                                        'btn-primary':
                                                            paginate == 6,
                                                        'btn-outline-secondary':
                                                            paginate != 6,
                                                    },
                                                ]"
                                            >
                                                6
                                            </span>
                                            <span
                                                @click="changeVal(12)"
                                                class="btn btn-sm"
                                                :class="[
                                                    {
                                                        'btn-primary':
                                                            paginate == 12,
                                                        'btn-outline-secondary':
                                                            paginate != 12,
                                                    },
                                                ]"
                                            >
                                                12</span
                                            ><span
                                                @click="changeVal(24)"
                                                class="btn btn-sm"
                                                :class="[
                                                    {
                                                        'btn-primary':
                                                            paginate == 24,
                                                        'btn-outline-secondary':
                                                            paginate != 24,
                                                    },
                                                ]"
                                            >
                                                24</span
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
                        <div class="row products">
                            <div
                                class="col-lg-4 col-md-6"
                                v-for="sach in books.data"
                            >
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div
                                                class="front"
                                                @click="loadpage"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: sach.ma },
                                                    }"
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
                                                /></router-link>
                                            </div>
                                            <div class="back" @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: sach.ma },
                                                    }"
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
                                                /></router-link>
                                            </div>
                                        </div>
                                    </div>
                                    <router-link
                                        @click="loadpage"
                                        :to="{
                                            name: 'detailbook',
                                            params: { id: sach.ma },
                                        }"
                                        class="invisible"
                                        ><img
                                            src="/img/product1.jpg"
                                            alt=""
                                            class="img-fluid"
                                    /></router-link>
                                    <div class="text">
                                        <h3>
                                            <router-link
                                                :to="{
                                                    name: 'detailbook',
                                                    params: { id: sach.ma },
                                                }"
                                                >{{ sach.title }}</router-link
                                            >
                                        </h3>
                                        <p class="price">
                                            <del></del
                                            >{{ formatPrice(sach.price) }} VNĐ
                                        </p>
                                        <p class="buttons">
                                            <span @click="loadpage">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: sach.ma },
                                                    }"
                                                    class="btn btn btn-outline-secondary"
                                                    >Xem chi tiết</router-link
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
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import EventBus from "../EventBus.vue";
import $ from "jquery";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
import axios from "axios";
import swal from "sweetalert";
export default {
    data() {
        return {
            search: "",
            detailbook: [],
            dataUser: [],
            listParent: [],
            laravelData: {},
            book: {},
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            books: {},
            message: [],
            paginate: 6,
            check: true,
            idloc: this.$route.params.id,
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
        };
    },
    props: {
        getCartCount: Function,
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
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        changeVal: function (value) {
            this.paginate = value;
            this.loadBooks();
        },
        viewCart: function () {
            if (localStorage.getItem("cart")) {
                this.carts = JSON.parse(localStorage.getItem("cart"));
                this.badge = this.carts.length;
                this.totalPrice = this.carts.reduce((total, item) => {
                    return total + this.quatity + item.price;
                }, 0);
                console.log(this.carts);
            }
        },
        storeCart: function () {
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem("cart", parsed);
            this.viewCart();
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
                            swal("Thêm vào giở thành công!", "", "success");
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
        },
        loadBooks: function (page = 1) {
            console.log(localStorage.getItem("cart"));
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
            if (this.idloc != null) {
                axios
                    .get(
                        "/api/user/sortbook?page=" +
                            page +
                            "&paginate=" +
                            this.paginate +
                            "&q=" +
                            "%" +
                            this.idloc +
                            "%" +
                            "&order=" +
                            this.filter
                    )
                    .then((response) => {
                        this.books = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
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
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
