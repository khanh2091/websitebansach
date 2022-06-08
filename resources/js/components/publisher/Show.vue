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
                            :class="[{ active: $route.name === 'publisher' }]"
                            :to="{ name: 'publisher' }"
                            >Danh sách nhà xuất bản</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addPublisher' }]"
                    :to="{ name: 'addPublisher' }"
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
                    Thêm nhà xuát bản
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary float-left">
                    Danh sách nhà xuất bản
                </h6>
            </div>
            <div
                class="d-flex justify-content-between align-content-center mb-2"
            >
                <div class="d-flex">
                    <div>
                        <div
                            class="d-flex align-items-center ml-4"
                            style="padding: 20px"
                        >
                            <select
                                id="paginate"
                                v-model="paginate"
                                class="form-control form-control-sm"
                            >
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            <label
                                for="paginate"
                                class="text-nowrap mr-2 mb-0"
                                style="margin-left: 10px"
                            >
                               nhà xuát bản trên trang</label
                            >
                        </div>
                    </div>

                    <div>
                        <div class="dropdown ml-4">
                            <!-- <button
                                v-if="checked.length > 0"
                                class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown"
                            >
                                With Checked ({{ checked.length }})
                            </button> -->
                            <div class="dropdown-menu">
                                <!-- <a
                                    href="#"
                                    onclick="confirm('Are you sure you wanna delete this Record?') || event.stopImmediatePropagation()"
                                    class="dropdown-item"
                                    type="button"
                                    @click.prevent="deleteRecords"
                                >
                                    Delete
                                </a>

                                <a
                                    :href="url"
                                    class="dropdown-item"
                                    type="button"
                                >
                                    Export
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding: 20px">
                    <input
                        v-model="search"
                        type="search"
                        class="form-control"
                        placeholder="Tìm kiếm..."
                    />
                </div>
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
                                <th>Tên nhà xuất bản</th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="publisher in publishers.data"
                                v-blind:key="publisher.ma"
                                :key="publisher.ma"
                            >
                                <td>{{ publisher.ma }}</td>

                                <td>
                                    {{ publisher.name }}
                                </td>
                                <td>{{ publisher.description }}</td>
                                <td>{{ publisher.created_at }}</td>
                                <td>{{ publisher.updated_at }}</td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        
                                        <b-button @click="showEditPublishers(publisher.ma)"
                                            type="button"
                                            class="btn btn-warning btn-sm float-left mx-2 btn-circle text-white"
                                            data-toggle="tooltip"
                                            title="Sửa"
                                            data-placement="bottom"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </b-button>
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm btn-circle btnDelete"
                                            data-toggle="tooltip"
                                            title="Xóa"
                                            data-placement="bottom"
                                            @click="deletePublishers(publisher.ma)"
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
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination
                    :data="publishers"
                    @pagination-change-page="loadPublishers"
                ></pagination>
            </div>
        </div>
        <!-- Modal -->
        <div>

            

            <b-modal
                id="modal-prevent-closing"
                ref="modal"
                title="Chỉnh sửa tác giả"
                @show="resetModal"
                @hidden="resetModal"
                @ok="handleOk"
            >
                <form ref="form" @submit.stop.prevent="handleSubmit">
                    <b-form-group
                        label="Mã"
                        label-for="code-input"
                        invalid-feedback="Code is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="code-input"
                            v-model="ma"
                            :state="nameState"
                            readonly
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        label="Name"
                        label-for="Name-input"
                        invalid-feedback="Lastname is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="Name-input"
                            v-model="name"
                            :state="nameState"
                            required
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        label="Mô tả"
                        label-for="description-input"
                        invalid-feedback="Biography is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="description-input"
                            v-model="description"
                            :state="nameState"
                            required
                        ></b-form-input>
                    </b-form-group>
                </form>
            </b-modal>
        </div>
    </div>
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
            laravelData: {},
            publisher: [],
            publishers: {},
            message: [],
            paginate: 10,
            ma: "",
            nameState: null,
            submittedNames: [],
            code: "",
            name: "",
            description: "",
            search: "",
        };
    },
    watch: {
        paginate: function (value) {
            this.loadPublishers();
        },
        search: function (value) {
            this.loadPublishers();
        },
        selectPage: function (value) {
            this.checked = [];
            if (value) {
                this.students.data.forEach((student) => {
                    this.checked.push(student.id);
                });
            } else {
                this.checked = [];
                this.selectAll = false;
            }
        },
        checked: function (value) {
            this.url = "/api/students/export/" + this.checked;
        },
    },
    mounted() {
        this.loadPublishers();
    },
    methods: {
        loadPublishers: function (page = 1) {
            axios
                .get("/api/admin/publisher?page=" + page 
                + "&paginate=" + this.paginate
                + "&q=" + "%" + this.search + "%")
                .then((response) => {
                    // this.laravelData = response.data;
                    this.publishers = response.data;
                    // $("#datatable").DataTable();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showEditPublishers: function (publisher) {
            // $("#modal-prevent-closing").modal("show");ư
            this.ma = publisher;
            this.name = "";
            this.description = "";
            this.$refs['modal'].show();
        },
        closeEditPublishers: function () {
            this.modal = "edit";
            this.product = product;
            $("#product").modal("show");
        },
        editPublishers: function () {
            swal({
                title: "Có chắc không?",
                text: "Sau khi thay đổi, bạn sẽ không thể khôi phục dữ liệu này!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios
                        .post(
                            "/api/admin/editpublisher/" +
                                this.ma,
                            {
                                ma: this.ma,
                                name:
                                    this.name,
                                description:
                                    this.description,
                            }
                        )
                        .then((response) => {
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
        deletePublishers: function (ma) {
            swal({
                title: "Có chắc không?",
                text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios
                        .delete("/api/admin/author/" + ma)
                        .then((response) => {
                            swal("Thành công! tác giả này đã được xóa!", {
                                icon: "success",
                            });
                            this.$router.go();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    swal("Đã hủy!");
                }
            });
        },
        checkFormValidity() {
            const valid = this.$refs.form.checkValidity();
            this.nameState = valid;
            return valid;
        },
        resetModal() {

            this.nameState = null;
        },
        handleOk(bvModalEvent) {
            // Prevent modal from closing
            bvModalEvent.preventDefault();
            // Trigger submit handler
            this.handleSubmit();
        },
        handleSubmit() {
            if (!this.checkFormValidity()) {
                return;
            }
            // Push the name to submitted names
            // this.submittedNames.push(this.name);
            // Hide the modal manually
            this.$nextTick(() => {
                this.editPublishers();
                this.$bvModal.hide("modal-prevent-closing");
            });
        },
    },
};
</script>
