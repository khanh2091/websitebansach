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
                                    <li
                                        aria-current="page"
                                        class="breadcrumb-item active"
                                    >
                                        / Doanh sách đơn hàng
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
                            <div class="card sidebar-menu">
                                <div class="card-header">
                                    <h3 class="h4 card-title">Chức năng</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column">
                                        <router-link
                                            :class="[
                                                {
                                                    active:
                                                        $route.name ===
                                                        'profile',
                                                },
                                            ]"
                                            :to="{ name: 'profile' }"
                                            class="nav-link"
                                            ><i class="fa fa-user"></i>Tài khoản
                                            của tôi</router-link
                                        >
                                        <router-link
                                            :class="[
                                                {
                                                    active:
                                                        $route.name ===
                                                        'checkorder',
                                                },
                                            ]"
                                            :to="{ name: 'checkorder' }"
                                            class="nav-link"
                                            ><i class="fa fa-list"></i>Đơn
                                            hàng</router-link
                                        ><a
                                            href="customer-wishlist.html"
                                            class="nav-link"
                                            ><i class="fa fa-heart"></i> Doanh
                                            sách yêu thích</a
                                        ><button
                                            @click="logout"
                                            class="button button1"
                                        >
                                            <i class="fa fa-sign-out"></i> Đăng
                                            xuất
                                        </button>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.col-lg-3-->
                            <!-- *** CUSTOMER MENU END ***-->
                        </div>
                        <div id="customer-orders" class="col-lg-9">
                            <div class="box">
                                <h1>Đơn hàng</h1>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn</th>
                                                <th>Ngày đặt</th>
                                                <th>Tổng cộng</th>
                                                <th>Trạng thái</th>
                                                <th>Xem đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="tamp in order">
                                                <th>{{ tamp.order_number }}</th>
                                                <td>
                                                    {{
                                                        format_date(
                                                            tamp.updated_at
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    {{
                                                        formatPrice(tamp.total)
                                                    }}
                                                    VNĐ
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="
                                                            tamp.status == 'new'
                                                        "
                                                        class="badge badge-info"
                                                        >Đang xử lý</span
                                                    >
                                                    <span
                                                        v-if="
                                                            tamp.status ==
                                                            'accepted'
                                                        "
                                                        class="badge badge-info"
                                                        >Đã xác nhận đơn
                                                        hàng</span
                                                    >
                                                    <span
                                                        v-if="
                                                            tamp.status ==
                                                            'delivering'
                                                        "
                                                        class="badge badge-info"
                                                        >Đang vận chuyển</span
                                                    >
                                                    <span
                                                        v-if="
                                                            tamp.status ==
                                                            'cancel'
                                                        "
                                                        class="badge badge-danger"
                                                        >Đã hủy</span
                                                    >
                                                    <span
                                                        v-if="
                                                            tamp.status ==
                                                            'done'
                                                        "
                                                        class="badge badge-success"
                                                        >Đã giao hàng</span
                                                    >
                                                </td>
                                                <td>
                                                    <button
                                                        @click="
                                                            showDetails(
                                                                tamp.order_number,
                                                                tamp.status
                                                            )
                                                        "
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                    <button
                                                        v-if="
                                                            tamp.status ==
                                                            'delivering'
                                                        "
                                                        @click="
                                                            daNhanHang(
                                                                tamp.order_number
                                                            )
                                                        "
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        Đã nhận
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
        <b-modal ref="my-modal" hide-footer title="Chi tiết đơn hàng" size="xl">
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
                                    <th colspan="2">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="tamp in orderDetails">
                                    <td style="max-width: 100px">
                                        {{ showImage(tamp.images, tamp.ma)
                                        }}<img
                                            :id="tamp.ma"
                                            style="
                                                max-height: 100px;
                                                max-width: 50px;
                                            "
                                        />
                                    </td>
                                    <td style="max-width: 150px">
                                        {{ tamp.name_product }}
                                    </td>
                                    <td>
                                        {{ tamp.quantity }}
                                    </td>
                                    <td>
                                        {{ formatPrice(tamp.price) }}
                                        VNĐ
                                    </td>
                                    <td :id="tamp.ma + 'tinhTong'" colspan="2">
                                        {{
                                            formatPrice(tinhTong(
                                                tamp.ma,
                                                tamp.price,
                                                tamp.quantity
                                            )),

                                        }}
                                        VNĐ
                                    </td>
                                    {{
                                        tongTatCa()
                                    }}
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Tổng cộng:</th>
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

            <b-button
                style="float: right"
                variant="outline-danger"
                @click="hideModal"
                >Đóng</b-button
            >
            <b-button
                v-if="status == 'new'"
                style="float: right; margin-right: 20px"
                variant="outline-danger"
                @click="showHuyDon"
                >Hủy đơn hàng</b-button
            >
            <b-button
                v-if="status == 'delivering'"
                style="float: right; margin-right: 20px"
                variant="outline-danger"
                @click="daNhanHang(maDon)"
                >Hủy đơn hàng</b-button
            >
        </b-modal>
        <b-modal
            ref="ly_do_huy"
            hide-footer
            title="Lý do hủy đơn hàng"
            size="sm"
        >
            <div class="table-responsive">
                <div class="form-group">
                    <input
                        id="email"
                        type="text"
                        :class="{
                            'is-invalid': error != null,
                        }"
                        class="form-control"
                        v-model="lydo"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="error != null"
                    >
                        {{ error }}
                    </div>
                </div>
            </div>

            <b-button
                style="float: right"
                variant="outline-danger"
                @click="closeLyDo"
                >Đóng</b-button
            >
            <b-button
                style="float: right; margin-right: 20px"
                variant="outline-danger"
                @click="huyDon(maDon)"
                >Hủy đơn hàng</b-button
            >
        </b-modal>
    </div>
</template>
<script>
import $ from "jquery";
import axios from "axios";
import swal from "sweetalert";
import moment from "moment";
import { getStorage, ref, listAll, getDownloadURL } from "firebase/storage";
export default {
    data() {
        return {
            order: [],
            dataUser: null,
            orderDetails: [],
            total: 0,
            status: "new",
            maDon: null,
            lydo: "",
            error: null,
        };
    },
    watch: {},
    mounted() {
        if (localStorage.usertoken.length != 0) {
            this.getUser();
        }
        this.loadOrder();
    },
    methods: {
        daNhanHang: function (ma) {
            axios
                .post("/api/user/danhan/" + ma, {
                    status: "done",
                })
                .then((response) => {
                    swal("Đã hủy đơn hàng", "", "success");
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.hideModal();
        },
        showHuyDon: function () {
            this.$refs["ly_do_huy"].show();
        },
        closeLyDo: function(){
             this.$refs["ly_do_huy"].hide();
        },
        huyDon: function () {
            this.error = null;
            if (this.lydo == "") {
                this.error = "Không được bỏ trống lý do";
            }
            if (this.lydo != "") {
                axios
                    .post("/api/admin/editorder/" + this.maDon, {
                        status: "cancel",
                        ly_do_huy: this.lydo,
                    })
                    .then((response) => {
                        this.lydo = "";
                        swal("Cập nhật thành công!", "", "success");
                        this.loadOrder();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.$refs["ly_do_huy"].hide();
            }
        },
        tongTatCa: function () {
            var tamp = 0;
            this.orderDetails.forEach((value, index) => {
                tamp =
                    parseInt(tamp) +
                    parseInt(value.quantity) * parseInt(value.price);
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
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        showDetails: function (ma, status) {
            this.maDon = null;
            this.maDon = ma;
            // console.log(ma)
            this.status = status;
            axios
                .get("/api/user/getdetailsorder/" + ma)
                .then((response) => {
                    this.orderDetails = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.showModel();
        },
        showModel() {
            this.$refs["my-modal"].show();
        },
        hideModal() {
            this.$refs["my-modal"].hide();
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        format_date(value) {
            if (value) {
                return moment(value.toString()).format("llll");
            }
        },

        loadpage: function () {
            this.$router.go();
        },
        logout: function () {
            localStorage.removeItem("usertoken");
            localStorage.removeItem("cart");
            this.$router.push({ name: "trangchu" });
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
                    this.dataUser = response;
                    axios
                        .get(
                            "/api/user/getallorder?user=" +
                                this.dataUser.data.user.id
                        )
                        .then((response) => {
                            this.order = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
                .catch(function (error) {
                    console.log(error);
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
                    console.log(error);
                });
        },
    },
};
</script>
