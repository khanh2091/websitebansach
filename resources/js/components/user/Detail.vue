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
                                                    $route.name === 'allbook',
                                            },
                                        ]"
                                        :to="{ name: 'allbook' }"
                                    >
                                        Trang chủ
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Sách</a>
                                </li>
                                <li
                                    aria-current="page"
                                    class="breadcrumb-item active"
                                >
                                    {{ book.title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
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
                                        <a href="category.html" class="nav-link"
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
                                            <li>
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    class="nav-link"
                                                    >{{
                                                        tamp.title
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a
                                            href="category.html"
                                            class="nav-link active"
                                            >Tác giả
                                            <span class="badge badge-light">{{
                                                tacgia.length
                                            }}</span></a
                                        >
                                        <ul
                                            class="list-unstyled"
                                            v-for="tamp in tacgia"
                                        >
                                            <li>
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    class="nav-link"
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
                                        <a href="category.html" class="nav-link"
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
                                            <li>
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    class="nav-link"
                                                >
                                                    >{{
                                                        tamp.name
                                                    }}</router-link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="category.html" class="nav-link"
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
                                            <li>
                                                <router-link
                                                    :to="{
                                                        name: 'sortbook',
                                                        params: { id: tamp.ma },
                                                    }"
                                                    class="nav-link"
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
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="height: 100%">
                                    {{ showImage(book.images, book.ma)
                                    }}<img
                                        :id="book.ma"
                                        style="height: 599px; width: 397px"
                                        class="img-fluid"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <h1 class="text-center">
                                        {{ book.title }}
                                    </h1>
                                    <p class="goToDescription">
                                        <a href="#details" class="scroll-to"
                                            >Xem chi tiết sản phẩm</a
                                        >
                                    </p>
                                    <p class="price">
                                        {{ formatPrice(book.price) }} VNĐ
                                    </p>
                                    <p class="text-center buttons">
                                        <button
                                            @click="addToCart(book.ma)"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ</button
                                        ><button
                                            class="btn btn-outline-primary"
                                        >
                                            <i class="fa fa-heart"></i> Yêu
                                            thích
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box" style="margin-top: 80px">
                            <p></p>
                            <h4>Chi tiết sách</h4>
                            <h4>Thể loại</h4>
                            <ul v-for="tamp in theloai">
                                <li v-if="tamp.ma == book.category_id">
                                    {{ tamp.title }}
                                </li>
                            </ul>
                            <h4>Tác giả</h4>
                            <ul v-for="tamp in tacgia">
                                <li v-if="tamp.ma == book.author_id">
                                    {{ tamp.firstname + " " + tamp.lastname }}
                                </li>
                            </ul>
                            <h4>Ngôn ngữ</h4>
                            <ul v-for="tamp in ngonngu">
                                <li v-if="tamp.ma == book.language_id">
                                    <router-link
                                        :to="{
                                            name: 'sortbook',
                                            params: { id: tamp.ma },
                                        }"
                                    >
                                        {{ tamp.name }}
                                    </router-link>
                                </li>
                            </ul>
                            <h4>Nhà xuất bản</h4>
                            <ul v-for="tamp in nhaxuatban">
                                <li v-if="tamp.ma == book.publisher_id">
                                    {{ tamp.name }}
                                </li>
                            </ul>
                            <h4>Mô tả</h4>
                            <blockquote>
                                <p>
                                    <em>{{ book.description }}.</em>
                                </p>
                            </blockquote>
                            <hr />
                        </div>
                        <div class="row same-height-row">
                            <div class="col-md-3 col-sm-6">
                                <div
                                    class="box"
                                    style="height: 347px; width: 100%"
                                >
                                    <h3>Cùng thể loại</h3>
                                </div>
                            </div>
                            <div
                                class="col-md-3 col-sm-6"
                                v-for="sach in listBookCategory"
                            >
                                <div
                                    class="product same-height"
                                    @click="loadpage"
                                >
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: sach.ma },
                                                    }"
                                                    >{{
                                                        showImageCategory(
                                                            sach.images,
                                                            sach.ma + "category"
                                                        )
                                                    }}
                                                    <img
                                                        :id="
                                                            sach.ma + 'category'
                                                        "
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
                                                        params: { id: sach.ma },
                                                    }"
                                                    >{{
                                                        showImageCategory(
                                                            sach.images,
                                                            sach.ma + "category"
                                                        )
                                                    }}<img
                                                        :id="
                                                            sach.id + 'category'
                                                        "
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
                                            params: { id: sach.ma },
                                        }"
                                        class="invisible"
                                        ><img
                                            src="/img/product2_2.jpg"
                                            class="img-fluid"
                                    /></router-link>
                                    <div class="text">
                                        <h3>{{ sach.title }}</h3>
                                        <p class="price">
                                            {{ formatPrice(sach.price) }} VNĐ
                                        </p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        </div>
                        <div class="row same-height-row">
                            <div class="col-md-3 col-sm-6">
                                <div
                                    class="box"
                                    style="height: 347px; width: 100%"
                                >
                                    <h3>Cùng tác giả</h3>
                                </div>
                            </div>
                            <div
                                class="col-md-3 col-sm-6"
                                v-for="sach in listBookAuthor"
                            >
                                <div
                                    class="product same-height"
                                    @click="loadpage"
                                >
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <router-link
                                                    :to="{
                                                        name: 'detailbook',
                                                        params: { id: sach.ma },
                                                    }"
                                                    >{{
                                                        showImageAuthor(
                                                            sach.images,
                                                            sach.ma + "author"
                                                        )
                                                    }}
                                                    <img
                                                        :id="sach.ma + 'author'"
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
                                                        params: { id: sach.ma },
                                                    }"
                                                    >{{
                                                        showImageAuthor(
                                                            sach.images,
                                                            sach.ma + "author"
                                                        )
                                                    }}<img
                                                        :id="sach.ma + 'author'"
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
                                            params: { id: sach.ma },
                                        }"
                                        class="invisible"
                                        ><img
                                            src="/img/product2_2.jpg"
                                            class="img-fluid"
                                    /></router-link>
                                    <div class="text">
                                        <h3>{{ sach.title }}</h3>
                                        <p class="price">
                                            {{ formatPrice(sach.price) }} VNĐ
                                        </p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-9-->
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
            dataUser: [],
            listParent: [],
            laravelData: {},
            listBookCategory: {},
            listBookAuthor: {},
            book: null,
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            books: {},
            message: [],
            paginate: 6,
            loc: "",
            idsach: this.$route.params.id,
            detailbook: [],
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
            check: true,
        };
    },
    watch: {
        search: function (value) {
            this.loadBooks();
        },
        idsach: function (value) {
            this.loadBook();
            alert(this.idsach);
        },
    },
    props: {
        getCartCount: Function,
    },
    mounted() {
        this.loadEventBus();
        this.loadBooks();
        this.loadBook();
        this.adviseBook();
    },
    methods: {
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
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        adviseBook: function () {},
        loadBook: function () {
            axios
                .get("/api/user/detail/" + this.$route.params.id)
                .then((response) => {
                    this.book = response.data;
                    axios
                        .get("/api/user/listbook/" + this.book.category_id)
                        .then((response) => {
                            this.listBookCategory = response.data;
                            console.log(this.listBookCategory);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    axios
                        .get("/api/user/listbook/" + this.book.author_id)
                        .then((response) => {
                            this.listBookAuthor = response.data;
                            console.log(this.listBookAuthor);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showImageAuthor: function (fileName, id) {
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
        showImageCategory: function (fileName, id) {
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
                        "%"
                )
                .then((response) => {
                    this.books = response.data;
                    console.log(this.books.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadpage: function () {
            this.$router.go();
        },
    },
};
</script>
