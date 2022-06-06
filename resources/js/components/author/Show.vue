<template>
    <div>
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'home' }]"
                            :to="{ name: 'home' }"
                        >
                            <i
                                class="fas fa-home"
                                style="height: 10px; width: 10px"
                            ></i>
                        </router-link>
                    </li>
                    <li style="float: left">/</li>
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'author' }]"
                            :to="{ name: 'author' }"
                            >Danh sách tác giả</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addAuthor' }]"
                    :to="{ name: 'addAuthor' }"
                    class="btn btn-gray-800 d-inline-flex align-items-center me-2"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <svg
                        class="icon icon-xs me-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        ></path>
                    </svg>
                    Thêm tác giả
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary float-left">
                    Danh sách tác giả
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        width="100%"
                        cellspacing="0"
                        id="datatable"
                    >
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Họ tên</th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chuc nang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="author in authors"
                                v-blind:key="author.ma"
                                :key="author.ma"
                            >
                                <td>{{ author.ma }}</td>

                                <td>
                                   {{ author.firstname }} {{ author.lastname }} 
                                </td>
                                <td>{{ author.biography }}</td>
                                <td>{{ author.created_at }}</td>
                                <td>{{ author.updated_at }}</td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-sm float-left btn-circle"
                                            data-toggle="tooltip"
                                            title="Xem"
                                            data-placement="bottom"
                                            @click="showAuthor(author.ma)"
                                        >
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm float-left mx-2 btn-circle text-white"
                                            data-toggle="tooltip"
                                            title="Sửa"
                                            data-placement="bottom"
                                            @click="showEditAuthors(author)"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm btn-circle btnDelete"
                                            data-toggle="tooltip"
                                            title="Xóa"
                                            data-placement="bottom"
                                            @click="deleteAuthor(author.ma)"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="EditAuthor" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Sửa tác giả</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeEditAuthors()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                            <form
                                class="needs-validation"
                                @submit.prevent="editAuthors"
                                novalidate
                            >
                                <div class="form-group mb-4">
                                    <label for="makh" class="col-form-label"
                                        >Mã tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="ma"
                                        name="ma"
                                        v-model="ma"
                                        placeholder="Mã tác giả"
                                        value=""
                                        pattern="[N][V][0-9]{3}"
                                        readonly
                                    />
                                    <div class="invalid-feedback">
                                        Đang trống hoặc mã không đúng (ví dụ:
                                        NV001)
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Họ tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="firstname"
                                        name="firstname"
                                        v-model="firstname"
                                        placeholder="Họ tác giả"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Tên tác giả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="lastname"
                                        name="lastname"
                                        v-model="lastname"
                                        placeholder="Tên tác giả"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label
                                        for="validationKhachHangNam"
                                        class="col-form-label"
                                        >Mô tả:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="biography"
                                        name="biography"
                                        v-model="biography"
                                        placeholder="Mô tả"
                                        
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống tên nhân viên
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeEditAuthors()">Close</button>
                        <button type="button" class="btn btn-primary" @click="editAuthors()">Apply changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import swal from "sweetalert";
export default {
    data: function () {
        return {
            authors: [],
            message:[]
        };
    },
    mounted() {
        this.loadAuthors();
    },
    methods: {
        loadAuthors: function () {
            axios
                .get('/api/author')
                .then((response) => {
                    this.authors = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showEditAuthors: function (author) {
            this.modal = 'edit';
            this.authorEdit = author;
            document.getElementById("ma").value = author.ma;
            document.getElementById("lastname").value = author.lastname;
            document.getElementById("firstname").value = author.firstname;
            document.getElementById("biography").value = author.biography;
            $("#EditAuthor").modal("show");
        },
        closeEditAuthors: function () {
            $("#EditAuthor").modal("hide");
        },
        editAuthors: function () {
            swal({
                title: "Có chắc không?",
                text: "Sau khi thay đổi, bạn sẽ không thể khôi phục dữ liệu này!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios
                .post('api/editauthor/' + document.getElementById('ma').value, {
                    ma: document.getElementById('ma').value, 
                    firstname: document.getElementById('firstname').value, 
                    lastname: document.getElementById('lastname').value, 
                    biography: document.getElementById('biography').value})
                .then( (response)  => {
                    this.message = response.data;
                    swal("Thành công! tác giả đã được sửa", {
                                icon: "success",
                            });
                    this.$router.go();
                    // alert(this.message);
                })
                .catch(function (error) {
                    onsole.log(error);
                });
                } else {
                    swal("Đã hủy!");
                }
            });
        },
        deleteAuthor: function (ma) {
            swal({
                title: "Có chắc không?",
                text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios
                        .delete("api/author/" + ma)
                        .then((response) => {
                            let i = this.authors
                                .map((item) => item.ma)
                                .indexOf(ma); // find index of your object
                            this.authors.splice(i, 1);
                            swal("Thành công! tác giả này đã được xóa!", {
                                icon: "success",
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    swal("Đã hủy!");
                }
            });
        },
    },
};
</script>
