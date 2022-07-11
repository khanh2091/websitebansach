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
                            :class="[{ active: $route.name === 'book' }]"
                            :to="{ name: 'book' }"
                            >Danh sách sách</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="dropdown">
                <router-link
                    :class="[{ active: $route.name === 'addBook' }]"
                    :to="{ name: 'addBook' }"
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
                    Thêm sách
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-primary float-left">
                    Danh sách sách
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
                                sách trên trang</label
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
                                <th>Tên sách</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Số trang</th>
                                <th>Mô tả</th>
                                <th>Ngày xuất bản</th>
                                <th>Ngày tái bản</th>
                                <th>Thể loại</th>
                                <th>Ngôn ngữ</th>
                                <th>Nhà xuất bản</th>
                                <th>Tác giả</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="book in books.data"
                                v-blind:key="book.ma"
                                :key="book.ma"
                            >
                                <td>{{ book.ma }}</td>
                                <td>{{ book.title }}</td>
                                <td>
                                    {{ showImage(book.images, book.ma) }}
                                    <span>
                                        <img :id="book.ma" />
                                    </span>
                                </td>
                                <td>{{ book.price }}</td>
                                <td>{{ book.quantity }}</td>
                                <td>{{ book.page_number }}</td>
                                <td style="max-width: 400px">
                                    <textarea
                                        rows="4"
                                        cols="40"
                                        readonly
                                        style="border: none"
                                        >{{ book.description }}</textarea
                                    >
                                </td>
                                <td>
                                    {{ format_date(book.publication_date) }}
                                </td>
                                <td>{{ format_date(book.reprint_date) }}</td>
                                <td>
                                    <span
                                        v-for="tamp in theloai"
                                        v-if="tamp.ma == book.category_id"
                                    >
                                        {{ tamp.title }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        v-for="tamp in ngonngu"
                                        v-if="tamp.ma == book.language_id"
                                    >
                                        {{ tamp.name }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        v-for="tamp in nhaxuatban"
                                        v-if="tamp.ma == book.publisher_id"
                                    >
                                        {{ tamp.name }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        v-for="tamp in tacgia"
                                        v-if="tamp.ma == book.author_id"
                                    >
                                        {{ tamp.firstname }} {{ tamp.lastname }}
                                    </span>
                                </td>
                                <td>{{ format_date(book.created_at) }}</td>
                                <td>{{ format_date(book.updated_at) }}</td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <b-button
                                            @click="showEditBook(book.ma)"
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
                                            @click="
                                                deleteBook(book.ma, book.images)
                                            "
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
                    :data="books"
                    @pagination-change-page="loadBooks"
                ></pagination>
            </div>
        </div>
        <!-- Modal -->
        <div>
            <b-modal
                id="modal-prevent-closing"
                ref="modal"
                title="Chỉnh sửa sách"
                @show="resetModal"
                @hidden="resetModal"
                @ok="handleOk"
                size="xl"
            >
                <div class="form-group mb-4">
                    <label for="ma" class="col-form-label">Mã sách: </label>
                    <input
                        :class="{
                            'is-invalid': errors.ma != null,
                        }"
                        class="form-control"
                        type="text"
                        id="ma"
                        name="ma"
                        v-model="ma"
                        placeholder="Mã sách"
                        value=""
                        readonly
                    />
                    <div class="invalid-feedback" v-if="errors.ma != null">
                        {{ errors.ma }}
                    </div>
                </div>
                <div class="my-4">
                    <label for="title" class="col-form-label">Tên sách: </label>
                    <input
                        :class="{
                            'is-invalid': errors.title != null,
                        }"
                        class="form-control"
                        type="text"
                        id="title"
                        name="title"
                        v-model="title"
                        placeholder="Tên sách"
                        value=""
                        required
                    />
                    <div class="invalid-feedback" v-if="errors.title != null">
                        {{ errors.title }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="page_number" class="col-form-label"
                            >Số trang:
                        </label>
                        <input
                            class="form-control"
                            type="number"
                            v-model="page_number"
                            id="page_number"
                            name="page_number"
                            placeholder="Số trang sách"
                            value=""
                            :class="{
                                'is-invalid': errors.page_number != null,
                            }"
                            required
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors.page_number != null"
                        >
                            {{ errors.page_number }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="Gia" class="col-form-label">Giá: </label>
                        <input
                            v-model="price"
                            class="form-control"
                            type="number"
                            min="100"
                            max="1000000"
                            id="Gia"
                            name="Gia"
                            placeholder="Giá"
                            value=""
                            :class="{
                                'is-invalid': errors.price != null,
                            }"
                            required
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors.price != null"
                        >
                            {{ errors.price }}
                        </div>
                    </div>
                    <div class="col">
                        <label for="SoLuong" class="col-form-label"
                            >Số lượng:
                        </label>
                        <input
                            :class="{
                                'is-invalid': errors.quantity != null,
                            }"
                            class="form-control"
                            type="number"
                            min="0"
                            max="1000"
                            id="SoLuong"
                            name="SoLuong"
                            v-model="quantity"
                            placeholder="Số lượng"
                            value=""
                            required
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors.quantity != null"
                        >
                            {{ errors.quantity }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="my-1 me-2" for="language"
                            >Ngôn ngữ:
                        </label>
                        <select
                            class="form-select"
                            v-model="selectedNN"
                            :class="{
                                'is-invalid': errors.selectedNN != null,
                            }"
                        >
                            <option :value="null">Chọn ngôn ngữ</option>
                            <option
                                v-for="tamp in ngonngu"
                                v-bind:value="tamp.ma"
                            >
                                {{ tamp.name }}
                            </option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="errors.selectedNN != null"
                        >
                            {{ errors.selectedNN }}
                        </div>
                    </div>
                    <div class="col">
                        <label class="my-1 me-2" for="publisher"
                            >Nhà xuất bản</label
                        >
                        <select
                            class="form-select"
                            v-model="selectedNXB"
                            :class="{
                                'is-invalid': errors.selectedNXB != null,
                            }"
                        >
                            <option :value="null">Chọn nhà xuất bản</option>
                            <option
                                v-for="tamp in nhaxuatban"
                                v-bind:value="tamp.ma"
                            >
                                {{ tamp.name }}
                            </option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="errors.selectedNXB != null"
                        >
                            {{ errors.selectedNXB }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="my-1 me-2" for="language">
                            Chọn thể loại:
                        </label>
                        <select
                            class="form-select"
                            v-model="selectedTL"
                            :class="{
                                'is-invalid': errors.selectedTL != null,
                            }"
                        >
                            <option :value="null">Chọn thể loại:</option>
                            <option
                                v-for="tamp in theloai"
                                v-bind:value="tamp.ma"
                            >
                                {{ tamp.title }}
                            </option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="errors.selectedTL != null"
                        >
                            {{ errors.selectedTL }}
                        </div>
                    </div>
                    <div class="col">
                        <label class="my-1 me-2" for="publisher">
                            Chọn nhà tác giả</label
                        >
                        <select
                            class="form-select"
                            v-model="selectedTG"
                            :class="{
                                'is-invalid': errors.selectedTG != null,
                            }"
                        >
                            <option :value="null">Chọn nhà tác giả:</option>
                            <option
                                v-for="tamp in tacgia"
                                v-bind:value="tamp.ma"
                            >
                                {{ tamp.firstname }}
                                {{ tamp.lastname }}
                            </option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="errors.selectedTG != null"
                        >
                            {{ errors.selectedTG }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="company">Ngày xuất bản:</label>
                            <br />
                            <date-picker
                                :class="{
                                    'is-invalid':
                                        errors.publication_date != null,
                                }"
                                v-model="publication_date"
                                valueType="format"
                            ></date-picker>
                            <div
                                class="invalid-feedback"
                                v-if="errors.publication_date != null"
                            >
                                {{ errors.publication_date }}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="company">Ngày tái bản:</label>
                            <br />
                            <date-picker
                                :class="{
                                    'is-invalid':
                                        errors.publication_date != null,
                                }"
                                v-model="reprint_date"
                                valueType="format"
                            ></date-picker>
                            <div
                                class="invalid-feedback"
                                v-if="errors.reprint_date != null"
                            >
                                {{ errors.reprint_date }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="images" class="col-form-label"
                        >Chọn hình:
                    </label>
                    <div class="input-group">
                        <input
                            class="form-control"
                            ref="fileInput"
                            type="file"
                            id="formFileLg"
                            @input="selectImgFile"
                            required
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors.selectImgFile != null"
                        >
                            {{ errors.selectImgFile }}
                        </div>
                    </div>
                </div>
                <div>
                    <img
                        v-if="filePreview"
                        @click="chooseFile"
                        :src="filePreview"
                        style="max-height: 100px; margin: 20px"
                    />
                </div>
                <div class="my-4">
                    <label for="description">Mô tả: </label>
                    <textarea
                        class="form-control"
                        v-model="description"
                        placeholder="Điền mô tả..."
                        id="description"
                        rows="4"
                    ></textarea>
                </div>
                <div class="form-group my-3">
                    <button
                        class="btn btn-success text-white"
                        @click="formSubmit"
                    >
                        Sửa
                    </button>
                </div>
            </b-modal>
        </div>
    </div>
</template>
<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import "bootstrap";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import swal from "sweetalert";
import $ from "jquery";
import moment from "moment";
import {
    getStorage,
    ref,
    getDownloadURL,
    uploadString,
    deleteObject,
} from "firebase/storage";
export default {
    components: { DatePicker },
    data: function () {
        return {
            listParent: [],
            laravelData: {},
            book: [],
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
            books: {},
            message: [],
            paginate: 10,
            nameState: null,
            submittedNames: [],
            code: "",
            slug: "",
            ma: "",
            title: "",
            price: "",
            slug: "",
            page_number: "",
            quantity: "",
            images: "",
            selectedTG: null,
            selectedTL: null,
            selectedNN: null,
            selectedNXB: null,
            publication_date: null,
            reprint_date: null,
            description: "",
            image: null,
            imagepreview: null,
            filePreview: null,
            picture: null,
            imageData: null,
            uploadValue: 0,
            search: "",
            selected: null,
            errors: [],
        };
    },
    watch: {
        paginate: function (value) {
            this.loadBooks();
        },
        search: function (value) {
            this.loadBooks();
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
        this.loadBooks();
    },
    methods: {
        chooseFile() {
            this.$refs.fileInput.click();
        },
        selectImgFile(e) {
            let fileInput = this.$refs.fileInput;
            let imgFile = fileInput.files;
            this.imageData = e.target.files[0];
            if (imgFile && imgFile[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.filePreview = e.target.result;
                };
                reader.readAsDataURL(imgFile[0]);
                this.$emit("fileInput", imgFile[0]);
            }
        },
        showImage(fileName, id) {
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
        format_date(value) {
            if (value) {
                return moment(String(value)).format("MMM Do YY");
            }
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
                    "/api/admin/book?page=" +
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
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        showEditBook: function (category) {
            this.ma = category;
            this.errors = [];
            axios
                .get("/api/admin/findbook/" + this.ma)
                .then((response) => {
                    this.listParent = response.data.data;
                    var parsedobj = JSON.parse(JSON.stringify(this.listParent));
                    for (let i = 0; i < parsedobj.length; i++) {
                        this.title = parsedobj[i].title;
                        this.slug = parsedobj[i].slug;
                        this.price = parsedobj[i].price;
                        this.description = parsedobj[i].description;
                        this.page_number = parsedobj[i].page_number;
                        this.quantity = parsedobj[i].quantity;
                        this.publication_date = parsedobj[i].publication_date;
                        this.reprint_date = parsedobj[i].reprint_date;
                        this.selectedNN = parsedobj[i].language_id;
                        this.selectedNXB = parsedobj[i].publisher_id;
                        this.selectedTL = parsedobj[i].category_id;
                        this.selectedTG = parsedobj[i].author_id;
                        this.images = parsedobj[i].images;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.$refs["modal"].show();
        },
        formSubmit: function () {
            this.errors = [];
            if (this.ma == "") {
                this.errors.ma = "Chưa nhập mã";
            }
            if (this.title == "") {
                this.errors.title = "Chưa nhập tên";
            }
            if (this.price == "") {
                this.errors.price = "Chưa nhập tên";
            }
            if (this.description == "") {
                this.errors.description = "Chưa nhập mô tả";
            }
            if (this.page_number == "") {
                this.errors.page_number = "Chưa nhập số trang sách";
            }
            if (this.quantity == "") {
                this.errors.quantity = "Chưa nhập số lượng sách";
            }
            if (this.publication_date == null) {
                this.errors.publication_date = "Chưa nhập ngày xuất bản";
            }
            if (this.reprint_date == null) {
                this.errors.reprint_date = "Chưa nhập ngày tái bản";
            }
            if (this.selectedTL == null) {
                this.errors.selectedTL = "Chưa chọn thể loại";
            }
            if (this.selectedTG == null) {
                this.errors.selectedTG = "Chưa chọn tác giả";
            }
            if (this.selectedNN == null) {
                this.errors.selectedNN = "Chưa chọn ngôn ngữ";
            }
            if (this.selectedNXB == null) {
                this.errors.selectedNXB = "Chưa chọn nhà xuát bản";
            } else {
                this.errors = [];
                if (
                    moment(String(this.publication_date)).format("MMM Do YY") <=
                    moment(String(this.reprint_date)).format("MMM Do YY")
                ) {
                    this.errors.publication_date =
                        "Ngày xuất bản lớn ngày tái bản";
                    this.errors.reprint_date = "Ngày tái bản nhỏ ngày xuất bản";
                } else {
                    swal({
                        title: "Có chắc không?",
                        text: "Sau khi thay đổi, bạn sẽ không thể khôi phục dữ liệu này!!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            if (this.imageData != null) {
                                const storage = getStorage();
                                // Create a reference to the file to delete
                                const desertRef = ref(storage, this.images);
                                // Delete the file
                                deleteObject(desertRef)
                                    .then(() => {
                                        // File deleted successfully
                                    })
                                    .catch((error) => {
                                        // Uh-oh, an error occurred!
                                    });
                                this.images = this.imageData.name;
                            }
                            axios
                                .post("/api/admin/editbook/" + this.ma, {
                                    ma: this.ma,
                                    title: this.title,
                                    slug: this.slug,
                                    price: this.price,
                                    quantity: this.quantity,
                                    sold: 0,
                                    images: this.images,
                                    page_number: this.page_number,
                                    description: this.description,
                                    publication_date: this.publication_date,
                                    reprint_date: this.reprint_date,
                                    category_id: this.selectedTL,
                                    language_id: this.selectedNN,
                                    publisher_id: this.selectedNXB,
                                    author_id: this.selectedTG,
                                    discount: 0,
                                })
                                .then((response) => {
                                    this.message = response.data;
                                    swal(this.message, {
                                        icon: "success",
                                    });
                                    this.$router.go();
                                    // alert(this.message);
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                            const storage = getStorage();
                            if (this.imageData != null) {
                                const storageRef = ref(
                                    storage,
                                    this.imageData.name
                                );
                                uploadString(
                                    storageRef,
                                    this.filePreview,
                                    "data_url"
                                ).then((snapshot) => {
                                    console.log(snapshot);
                                });
                            }
                        } else {
                            swal("Đã hủy!");
                        }
                    });
                }
            }
        },
        deleteBook: function (ma, hinh) {
            swal({
                title: "Có chắc không?",
                text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    const storage = getStorage();

                    // Create a reference to the file to delete
                    const desertRef = ref(storage, hinh);

                    // Delete the file
                    deleteObject(desertRef)
                        .then(() => {
                            axios
                                .delete("/api/admin/deletebook/" + ma)
                                .then((response) => {
                                    swal(
                                        "Thành công! tác giả này đã được xóa!",
                                        {
                                            icon: "success",
                                        }
                                    );
                                    this.$router.go();
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        })
                        .catch((error) => {
                            // Uh-oh, an error occurred!
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
            bvModalEvent.preventDefault();
            this.handleSubmit();
        },
        handleSubmit() {
            if (!this.checkFormValidity()) {
                return;
            }
            this.$nextTick(() => {
                this.formSubmit();
            });
        },
    },
};
</script>
