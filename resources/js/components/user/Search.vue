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
                                        Showing <strong>12</strong> of
                                        <strong>25</strong> products
                                    </div>
                                    <div
                                        class="col-md-12 col-lg-7 products-number-sort"
                                    >
                                        <form
                                            class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row"
                                        >
                                            <div class="products-number">
                                                <strong>Show</strong
                                                ><a
                                                    href="#"
                                                    class="btn btn-sm btn-primary"
                                                    >12</a
                                                ><a
                                                    href="#"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    >24</a
                                                ><a
                                                    href="#"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    >All</a
                                                ><span>products</span>
                                            </div>
                                            <div
                                                class="products-sort-by mt-2 mt-lg-0"
                                            >
                                                <strong>Sort by</strong>
                                                <select
                                                    name="sort-by"
                                                    class="form-control"
                                                >
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row products">
                                <div
                                    class="col-lg-3 col-md-4"
                                    v-for="sach in books.data"
                                >
                                    <div class="product">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front">
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
                                        <a href="detail.html" class="invisible"
                                            ><img
                                                src="img/product3.jpg"
                                                alt=""
                                                class="img-fluid"
                                        /></a>
                                        <div class="text">
                                            <h3>
                                                <a href="detail.html"
                                                    >{{sach.title }}</a
                                                >
                                            </h3>
                                            <p class="price">
                                                <del></del>{{sach.price }} VNĐ
                                            </p>
                                            <p class="buttons">
                                                <a
                                                    href="detail.html"
                                                    class="btn btn-outline-secondary"
                                                    >View detail</a
                                                ><a
                                                    href="basket.html"
                                                    class="btn btn-primary"
                                                    ><i
                                                        class="fa fa-shopping-cart"
                                                    ></i
                                                    >Add to cart</a
                                                >
                                            </p>
                                        </div>
                                        <!-- /.text-->
                                    </div>
                                    <!-- /.product            -->
                                </div>
                                <!-- /.products-->
                            </div>
                            <div class="pages">
                                <p class="loadMore">
                                    <a href="#" class="btn btn-primary btn-lg"
                                        ><i class="fa fa-chevron-down"></i> Load
                                        more</a
                                    >
                                </p>
                                <nav
                                    aria-label="Page navigation example"
                                    class="d-flex justify-content-center"
                                >
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a
                                                href="#"
                                                aria-label="Previous"
                                                class="page-link"
                                                ><span aria-hidden="true"
                                                    >«</span
                                                ><span class="sr-only"
                                                    >Previous</span
                                                ></a
                                            >
                                        </li>
                                        <li class="page-item active">
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a
                                                href="#"
                                                aria-label="Next"
                                                class="page-link"
                                                ><span aria-hidden="true"
                                                    >»</span
                                                ><span class="sr-only"
                                                    >Next</span
                                                ></a
                                            >
                                        </li>
                                    </ul>
                                </nav>
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
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    data() {
        return {
            search: "",
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
            paginate: 12,
        };
    },
    watch: {
        search: function (value) {
            this.loadBooks();
        },
    },
    mounted() {
        this.loadEventBus();
        this.loadBooks();
    },
    methods: {
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
    },
};
</script>
