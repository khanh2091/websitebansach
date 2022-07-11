<template>
    <div>
        <header class="header mb-5">
            <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
                        <div class="col-lg-6 text-center text-lg-right">
                            <ul class="menu list-inline mb-0">
                                <li
                                    v-if="dataUser.length == 0"
                                    class="list-inline-item"
                                >
                                    <a
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#login-modal"
                                        >Đăng nhập</a
                                    >
                                </li>
                                <li
                                    v-if="dataUser.length == 0"
                                    class="list-inline-item"
                                >
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'register',
                                            },
                                        ]"
                                        :to="{ name: 'register' }"
                                        >Đăng ký</router-link
                                    >
                                </li>
                                <li
                                    v-if="dataUser.length != 0"
                                    class="list-inline-item"
                                >
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'profile',
                                            },
                                        ]"
                                        :to="{ name: 'profile' }">{{
                                        dataUser.data.user.firstname +
                                        " " +
                                        dataUser.data.user.lastname
                                    }}</router-link>
                                </li>
                                <li
                                    v-if="dataUser.length != 0"
                                    class="list-inline-item"
                                >
                                    <span @click="logout">Logout</span>
                                </li>
                                <!-- <li class="list-inline-item">
                                    <a href="contact.html">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Recently viewed</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div
                    id="login-modal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="Login"
                    aria-hidden="true"
                    class="modal fade"
                >
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Khách hàng đăng nhập
                                </h5>
                                <button
                                    type="button"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                    class="close"
                                >
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <!-- form login -->
                            <div class="modal-body">
                                <form v-on:submit.prevent="login">
                                    <div class="form-group">
                                        <input
                                            v-model="emaillogin"
                                            id="email-modal"
                                            type="text"
                                            placeholder="email"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            v-model="passwordlogin"
                                            id="password-modal"
                                            type="password"
                                            placeholder="password"
                                            class="form-control"
                                        />
                                    </div>
                                    <p class="text-center">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-sign-in"></i> Đăng
                                            nhập
                                        </button>
                                    </p>
                                </form>
                                <p class="text-center text-muted">
                                    Chưa đăng ký tài khoản?
                                </p>
                                <p class="text-center text-muted">
                                    <router-link
                                        :class="[
                                            {
                                                active:
                                                    $route.name === 'register',
                                            },
                                        ]"
                                        :to="{ name: 'register' }"
                                        ><strong
                                            >Đăng ký ngay</strong
                                        ></router-link
                                    >! Nó dễ dàng và được thực hiện trong 1 phút
                                    và cho bạn có quyền giảm giá đặc biệt và
                                    nhiều hơn!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *** TOP BAR END ***-->
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container" @click="loadpage">
                    <router-link
                        :class="[
                            {
                                active: $route.name == 'trangchu',
                            },
                        ]"
                        :to="{ name: 'trangchu' }"
                        ><img
                            src="/img/logo.png"
                            alt="Obaju logo"
                            class="d-none d-md-inline-block"
                        /><img
                            src="/img/logo-small.png"
                            alt="Obaju logo"
                            class="d-inline-block d-md-none"
                        /><span class="sr-only"
                            >Obaju - go to homepage</span
                        ></router-link
                    >
                    <div class="navbar-buttons">
                        <button
                            type="button"
                            data-toggle="collapse"
                            data-target="#navigation"
                            class="btn btn-outline-secondary navbar-toggler"
                        >
                            <span class="sr-only">Toggle navigation</span
                            ><i class="fa fa-align-justify"></i>
                        </button>
                        <button
                            type="button"
                            data-toggle="collapse"
                            data-target="#search"
                            class="btn btn-outline-secondary navbar-toggler"
                        >
                            <span class="sr-only">Toggle search</span
                            ><i class="fa fa-search"></i></button
                        ><a
                            href="basket.html"
                            class="btn btn-outline-secondary navbar-toggler"
                            ><i class="fa fa-shopping-cart"></i
                        ></a>
                    </div>
                    <!-- menu -->
                    <div id="navigation" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"  @click="loadpage"> 
                                <router-link 
                                    :class="[
                                        {
                                            active: $route.name == 'trangchu',
                                        },
                                    ]"
                                    :to="{ name: 'trangchu' }"
                                    class="nav-link"
                                    >Trang chủ</router-link
                                >
                            </li>
                            <li class="nav-item" @click="loadpage">
                                <router-link
                                    :class="[
                                        {
                                            active: $route.name == 'Sách',
                                        },
                                    ]"
                                    :to="{ name: 'allbook' }"
                                    class="nav-link"
                                    >Sách</router-link
                                >
                            </li>
                            <li class="nav-item dropdown menu-large">
                                <a
                                    href="#"
                                    data-toggle="dropdown"
                                    data-hover="dropdown"
                                    data-delay="200"
                                    class="dropdown-toggle nav-link"
                                    >Danh mục<b class="caret"></b
                                ></a>
                                <ul class="dropdown-menu megamenu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-3">
                                                <h5>Tác giả</h5>
                                                <ul
                                                    class="list-unstyled mb-3"
                                                    v-for="tamp in tacgia"
                                                >
                                                    <li
                                                        class="nav-item"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'sortbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                tamp.firstname +
                                                                " " +
                                                                tamp.lastname
                                                            }}</router-link
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <h5>Thể loại</h5>
                                                <ul
                                                    class="list-unstyled mb-3"
                                                    v-for="tamp in theloai"
                                                >
                                                    <li
                                                        class="nav-item"
                                                        @click="loadpage"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'sortbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                tamp.title
                                                            }}</router-link
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <h5>Ngôn ngữ</h5>
                                                <ul
                                                    class="list-unstyled mb-3"
                                                    v-for="tamp in ngonngu"
                                                >
                                                    <li
                                                        class="nav-item"
                                                        @click="loadpage"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'sortbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                tamp.name
                                                            }}</router-link
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <h5>Nhà xuất bản</h5>
                                                <ul
                                                    class="list-unstyled mb-3"
                                                    v-for="tamp in nhaxuatban"
                                                >
                                                    <li
                                                        class="nav-item"
                                                        @click="loadpage"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'sortbook',
                                                                params: {
                                                                    id: tamp.ma,
                                                                },
                                                            }"
                                                            >{{
                                                                tamp.name
                                                            }}</router-link
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="navbar-buttons d-flex justify-content-end">
                            <!-- /.nav-collapse-->
                            <div
                                id="search-not-mobile"
                                class="navbar-collapse collapse"
                            ></div>
                            <a
                                data-toggle="collapse"
                                href="#search"
                                class="btn navbar-btn btn-primary d-none d-lg-inline-block"
                                ><span class="sr-only">Toggle search</span
                                ><i class="fa fa-search"></i
                            ></a>
                            <div
                                id="basket-overview"
                                class="navbar-collapse collapse d-none d-lg-block"
                            >
                                <router-link
                                    :class="[
                                        { active: $route.name === 'cart' },
                                    ]"
                                    :to="{ name: 'cart' }"
                                    class="btn btn-primary navbar-btn"
                                    ><i class="fa fa-shopping-cart"></i
                                    ><span
                                        >Giỏ hàng</span
                                    ></router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="search" class="collapse">
                <div class="container">
                    <form
                        role="search"
                        class="ml-auto"
                        v-on:submit.prevent="searchSubmit"
                    >
                        <div class="input-group">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Tìm kiếm"
                                class="form-control"
                            />
                            <div class="input-group-append">
                                <button
                                    @click="searchSubmit"
                                    type="button"
                                    class="btn btn-primary"
                                >
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <router-view :getCartCount="getcartcount"></router-view>
        <!--
    *** FOOTER ***
    _________________________________________________________
    -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="mb-3">Pages</h4>
                        <ul class="list-unstyled">
                            <li><a href="text.html">About us</a></li>
                            <li>
                                <a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                        <hr />
                        <h4 class="mb-3">User section</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#login-modal"
                                    >Login</a
                                >
                            </li>
                            <li>
                                <router-link
                                    :class="[
                                        { active: $route.name === 'register' },
                                    ]"
                                    :to="{ name: 'register' }"
                                    >Regiter</router-link
                                >
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-3-->
                    <div class="col-lg-3 col-md-6">
                        <h4 class="mb-3">Top categories</h4>
                        <h5>Men</h5>
                        <ul class="list-unstyled">
                            <li><a href="category.html">T-shirts</a></li>
                            <li><a href="category.html">Shirts</a></li>
                            <li><a href="category.html">Accessories</a></li>
                        </ul>
                        <h5>Ladies</h5>
                        <ul class="list-unstyled">
                            <li><a href="category.html">T-shirts</a></li>
                            <li><a href="category.html">Skirts</a></li>
                            <li><a href="category.html">Pants</a></li>
                            <li><a href="category.html">Accessories</a></li>
                        </ul>
                    </div>
                    <!-- /.col-lg-3-->
                    <div class="col-lg-3 col-md-6">
                        <h4 class="mb-3">Where to find us</h4>
                        <p>
                            <strong>Obaju Ltd.</strong><br />13/25 New Avenue<br />New
                            Heaven<br />45Y 73J<br />England<br /><strong
                                >Great Britain</strong
                            >
                        </p>
                        <a href="contact.html">Go to contact page</a>
                        <hr class="d-block d-md-none" />
                    </div>
                    <!-- /.col-lg-3-->
                    <div class="col-lg-3 col-md-6">
                        <h4 class="mb-3">Get the news</h4>
                        <p class="text-muted">
                            Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames ac turpis egestas.
                        </p>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" /><span
                                    class="input-group-append"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                    >
                                        Subscribe!
                                    </button></span
                                >
                            </div>
                            <!-- /input-group-->
                        </form>
                        <hr />
                        <h4 class="mb-3">Stay in touch</h4>
                        <p class="social">
                            <a href="#" class="facebook external"
                                ><i class="fa fa-facebook"></i></a
                            ><a href="#" class="twitter external"
                                ><i class="fa fa-twitter"></i></a
                            ><a href="#" class="instagram external"
                                ><i class="fa fa-instagram"></i></a
                            ><a href="#" class="gplus external"
                                ><i class="fa fa-google-plus"></i></a
                            ><a href="#" class="email external"
                                ><i class="fa fa-envelope"></i
                            ></a>
                        </p>
                    </div>
                    <!-- /.col-lg-3-->
                </div>
                <!-- /.row-->
            </div>
            <!-- /.container-->
        </div>
        <!-- /#footer-->
        <!-- *** FOOTER END ***-->

        <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <p class="text-center text-lg-left">
                            ©2022 Nguyễn Quốc Khánh.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-center text-lg-right">
                            Template design by
                            <a href="https://bootstrapious.com/"
                                >Bootstrapious</a
                            >
                            <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import EventBus from "../EventBus.vue";
import $ from "jquery";
export default {
    data() {
        return {
            dataUser: [],
            auth: "",
            email: "",
            name: "",
            emaillogin: "",
            passwordlogin: "",
            search: "",
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            carts: 0,
        };
    },
    watch: {
        search(q) {
            this.searchSubmit(q);
        },
    },
    mounted() {
        this.loadEventBus();
        this.loadBook();
        // this.tamp();
        if (localStorage.usertoken != null) {
            this.getUser();
        }
        if (localStorage.cart != null) {
            this.carts = JSON.parse(localStorage.getItem("cart")).length;
        }
        // console.log(JSON.parse(localStorage.getItem("cart")).length);
        // localStorage.removeItem("cart");
    },
    methods: {
        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        getcartcount: function (count) {
            this.carts = count;
        },
        loadpage: function () {
            this.$router.go();
        },
        searchSubmit: function (q) {
            // alert('hello');
            EventBus.$emit("search", this.search);
            const timkiem = this.search;
            this.$router.push({ name: "search", query: { timkiem } });
        },
        tamp: function () {
            console.log(localStorage.usertoken);
            console.log(this.dataUser);
        },
        logout: function () {
            localStorage.removeItem("usertoken");
            localStorage.removeItem("cart");
            this.$router.go();
            this.tamp();
        },
        loadEventBus: function () {
            EventBus.$on("logged-in", (status) => {
                this.auth = status;
            });
        },
        getUser: function () {
            axios
                .get("/api/profile", {
                    headers: {
                        Authorization: `Bearer ${localStorage.usertoken}`,
                    },
                })
                .then((response) => {
                    this.dataUser = response;
                    // console.log(this.dataUser);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        login: function () {
            // console.log(this.emaillogin + this.passwordlogin);
            axios
                .post("/api/login", {
                    email: this.emaillogin,
                    password: this.passwordlogin,
                })
                .then((res) => {
                    localStorage.setItem("usertoken", res.data.token);
                    this.loginemail = "";
                    this.loginpassword = "";
                    this.$router.go();
                })
                .catch((err) => {
                    console.log(err);
                });

            this.emitMethod();
        },
        emitMethod() {
            EventBus.$emit("logged-in", "loggedin");
        },
        loadBook: function () {
            axios
                .get("/api/admin/all_categoryHead")
                .then((response) => {
                    this.theloai = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_languageHead")
                .then((response) => {
                    this.ngonngu = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_authorHead")
                .then((response) => {
                    this.tacgia = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/all_publisherHead")
                .then((response) => {
                    this.nhaxuatban = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
