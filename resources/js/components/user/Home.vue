<template>
    <div>
        <div id="content">
            <!-- banner -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <b-carousel
                            id="carousel-1"
                            v-model="slide"
                            :interval="4000"
                            controls
                            indicators
                            background="#ababab"
                            img-width="1024"
                            img-height="480"
                            style="text-shadow: 1px 1px 2px #333"
                            @sliding-start="onSlideStart"
                            @sliding-end="onSlideEnd"
                        >
                            <!-- Text slides with image -->
                            <b-carousel-slide style="height: 600px">
                                <template #img>
                                    <img
                                        id="myimg0"
                                        class="d-block img-fluid w-100"
                                        width="1024"
                                        height="100%"
                                        src="https://picsum.photos/1024/480/?image=55"
                                        alt="image slot"
                                    />
                                </template>
                            </b-carousel-slide>

                            <!-- Slides with custom text -->
                            <b-carousel-slide style="height: 600px">
                                <template #img>
                                    <img
                                        id="myimg1"
                                        class="d-block img-fluid w-100"
                                        width="1024"
                                        height="100%"
                                        src="https://picsum.photos/1024/480/?image=55"
                                        alt="image slot"
                                    />
                                </template>
                            </b-carousel-slide>

                            <!-- Slides with image only -->
                            <b-carousel-slide style="height: 600px">
                                <template #img>
                                    <img
                                        id="myimg2"
                                        class="d-block img-fluid w-100"
                                        width="1024"
                                        height="100%"
                                        src="https://picsum.photos/1024/480/?image=55"
                                        alt="image slot"
                                    />
                                </template>
                            </b-carousel-slide>

                            <!-- Slides with img slot -->
                            <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
                            <b-carousel-slide style="height: 600px">
                                <template #img>
                                    <img
                                        id="myimg3"
                                        class="d-block img-fluid w-100"
                                        width="1024"
                                        height="100%"
                                        src="https://picsum.photos/1024/480/?image=55"
                                        alt="image slot"
                                    />
                                </template>
                            </b-carousel-slide>

                            <!-- Slide with blank fluid image to maintain slide aspect ratio -->
                        </b-carousel>
                    </div>
                </div>
            </div>
            <!-- show các loai sach -->
            <div style="margin-top: 30px">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Sản phẩm mới</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row products">
                        <div
                            class="col-lg-3 col-md-4"
                            v-for="book in books.data"
                        >
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <router-link
                                                :to="{
                                                    name: 'detailbook',
                                                    params: { id: book.ma },
                                                }"
                                                >{{
                                                    showImage(
                                                        book.images,
                                                        book.ma
                                                    )
                                                }}<img
                                                    :id="book.ma"
                                                    style="
                                                        height: 337px;
                                                        width: 253px;
                                                    "
                                                    class="img-fluid"
                                            /></router-link>
                                        </div>
                                        <div class="back">
                                            <router-link
                                                :to="{
                                                    name: 'detailbook',
                                                    params: { id: book.ma },
                                                }"
                                                >{{
                                                    showImage(
                                                        book.images,
                                                        book.ma
                                                    )
                                                }}<img
                                                    :id="book.ma"
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
                                    :to="{
                                        name: 'detailbook',
                                        params: { id: book.ma },
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
                                                params: { id: book.ma },
                                            }"
                                            >{{ book.title }}</router-link
                                        >
                                    </h3>
                                    <p class="price">
                                        <del></del
                                        >{{ formatPrice(book.price) }} VNĐ
                                    </p>
                                    <p class="buttons">
                                        <span @click="loadpage">
                                            <router-link
                                                :to="{
                                                    name: 'detailbook',
                                                    params: { id: book.ma },
                                                }"
                                                class="btn btn-outline-secondary"
                                                >Xem chi tiết</router-link
                                            >
                                        </span>
                                        <span
                                            @click="addToCart(book.ma)"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pages">
                        <p class="loadMore" @click="loadpage">
                            <router-link
                                class="btn btn-primary btn-lg"
                                :to="{ name: 'allbook' }"
                                >Xem thêm</router-link
                            >
                        </p>
                    </div>
                </div>

                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import swal from "sweetalert";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import EventBus from "../EventBus.vue";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    components: { DatePicker },
    data() {
        return {
            books: {},
            urlbanner: [],
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            slide: 0,
            sliding: null,
            paginate: 8,
            carts: [],
            cartadd: {
                ma: "",
                title: "",
                price: "",
                image: "",
                quatity: 1,
            },
            badge: 0,
            totalPrice: 0,
            detailbook: [],
        };
    },
    props: {
        getCartCount: Function,
    },
    mounted() {
        this.loadBanner();
        this.loadBook();
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
        loadBanner: function () {
            var dem = 0;
            const storage = getStorage();
            // Create a reference under which you want to list
            const listRef = ref(storage, "/banner");

            // Find all the prefixes and items.
            listAll(listRef)
                .then((res) => {
                    res.prefixes.forEach((folderRef) => {
                        // All the prefixes under listRef.
                        // You may call listAll() recursively on them.
                    });
                    res.items.forEach((itemRef) => {
                        // All the items under listRef.
                        getDownloadURL(ref(storage, "banner/" + itemRef.name))
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
                                const img = document.getElementById(
                                    "myimg" + dem
                                );
                                img.setAttribute("src", url);
                                dem = dem + 1;
                            })
                            .catch((error) => {
                                // Handle any errors
                            });
                    });
                })
                .catch((error) => {
                    // Uh-oh, an error occurred!
                });
        },
        onSlideStart(slide) {
            this.sliding = true;
        },
        onSlideEnd(slide) {
            this.sliding = false;
        },
        loadpage: function () {
            this.$router.go();
        },
        loadBook: function () {
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
                .get("/api/admin/all_book")
                .then((response) => {
                    this.books = response;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
