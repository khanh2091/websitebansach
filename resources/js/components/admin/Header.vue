<template>
    <main class="content">
        <nav v-if="dataUser.user.role == 'employee' || dataUser.user.role=='admin'" 
            class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0"
        >
            <div class="container-fluid px-0">
                <div
                    class="d-flex justify-content-between w-100"
                    id="navbarSupportedContent"
                >
                    <div class="d-flex align-items-center"></div>

                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">
                        </li>
                        <li class="nav-item dropdown ms-lg-3">
                            <a
                                class="nav-link dropdown-toggle pt-1 px-0"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <div class="media d-flex align-items-center">
                                    <img
                                        class="avatar rounded-circle"
                                        alt="Image placeholder"
                                        :src="'/img/team/profile-picture-1.jpg'"
                                    />
                                    <div
                                        class="media-body ms-2 text-dark align-items-center d-none d-lg-block"
                                    >
                                        <span
                                            class="mb-0 font-small fw-bold text-gray-900"
                                            >{{ dataUser.user.firstname + " " + dataUser.user.lastname}}</span
                                        >
                                    </div>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1"
                            >
                                <a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                >
                                    <svg
                                        class="dropdown-icon text-gray-400 me-2"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    Thông tin tài khoản
                                </a>
                                <a
                                    class="dropdown-item d-flex align-items-center"
                                    href="#"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="dropdown-icon text-gray-400 me-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        />
                                    </svg>
                                    Đổi mật khẩu
                                </a>
                                <div
                                    role="separator"
                                    class="dropdown-divider my-1"
                                ></div>
                                <button
                                    class="dropdown-item d-flex align-items-center"
                                    href="javascript:void(0)"
                                    data-toggle="modal"
                                    data-target="#logoutModal"
                                    @click = "logout"
                                >
                                    <svg
                                        class="dropdown-icon text-danger me-2"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        ></path>
                                    </svg>
                                    Đăng Xuất
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </main>
</template>
<script>
import $ from "jquery";
export default {
    data() {
        return {
            dataUser: [],
            role: "",
            errorAccunt: null,
        };
    },
    watch: {
        search(q) {
            this.searchSubmit(q);
        },
    },
    mounted() {
        // this.tamp();
        if (localStorage.usertoken != null) {
            this.getUser();
        }
        if (localStorage.usertoken == null) {
            this.$router.push({ path: "/login_admin" });
            this.$router.go();
        }
    },
    methods: {
        logout: function () {
            localStorage.removeItem("usertoken");
            localStorage.removeItem("cart");
            this.$router.push({ path: "/login_admin" });
            this.$router.go();
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
                    console.log(this.dataUser);
                    if ((this.dataUser == "Đăng nhập quá hạn")) {
                        this.$router.push({ path: "/login_admin" });
                        this.$router.go();
                    }
                    if (this.dataUser.user.role == "customer") {
                        alert("Tài khoản của bạn không có quyến truy cập");
                        this.$router.push({ path: "/login_admin" });
                        this.$router.go();
                    }
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
            if (this.errorAccunt != null) {
                this.$router.push({ path: "/login_admin" });
                this.$router.go();
            }
        },
    },
};
</script>
