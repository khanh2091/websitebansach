<template>
    <span>
        <div class="row">
            <!-- Category -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Sách
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ this.demS }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-sitemap fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Thể loại
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ this.demTL }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-sitemap fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Nhà sản xuất
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ this.demNXB }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-book-open fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Tác giả
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ demTG }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-sitemap fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-info text-uppercase mb-1"
                                >
                                    Đơn Đặt Hàng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div
                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                        >
                                            {{ this.demDH }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-shopping-cart fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coupons -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                >
                                    Nhân viên
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ this.demNV }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-money-bill-wave fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Posts-->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-danger text-uppercase mb-1"
                                >
                                    Khách hàng
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ demKH }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-pencil-alt fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </span>
</template>
<script>
import "bootstrap";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import swal from "sweetalert";
import $ from "jquery";
export default {
    data: function () {
        return {
            demDH: 0,
            demS: 0,
            demTG: 0,
            demNXB: 0,
            demTL: 0,
            demNV: 0,
            demKH: 0,
        };
    },

    mounted() {
        this.loadAuthors();
    },
    methods: {
        loadAuthors: function (page = 1) {
            axios
                .get("/api/admin/count_category")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demTL = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_author")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demTG = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_publisher")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demNXB = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_accountemploy")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demNV = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_accountcustomer")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demKH = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_book")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demS = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios
                .get("/api/admin/count_order")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.demDH = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
