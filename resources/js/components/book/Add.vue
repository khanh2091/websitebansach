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
                    <li class="breadcrumb-item">
                        <router-link
                            class="nav-link"
                            :class="[{ active: $route.name === 'addBook' }]"
                            :to="{ name: 'addBook' }"
                            >Thêm sách</router-link
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
                    Thêm thêm sách
                </router-link>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div>
                <div class="card-header py-3">
                    <h6 class="mt-2 font-weight-bold text-primary float-left">
                        Thêm thêm sách
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form
                                class="needs-validation"
                                @submit.prevent="formSubmit"
                                novalidate
                                enctype="multipart/form-data"
                            >
                                <div class="form-group mb-4">
                                    <label for="ma" class="col-form-label"
                                        >Mã sách:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="ma"
                                        name="ma"
                                        v-model="ma"
                                        placeholder="Mã sách"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống mã
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="title" class="col-form-label"
                                        >Tên sách:
                                    </label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="title"
                                        name="title"
                                        v-model="title"
                                        placeholder="Tên sách"
                                        value=""
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Không được bỏ trống giá
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="slug" class="col-form-label"
                                            >Slug:
                                        </label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="slug"
                                            name="slug"
                                            v-model="slug"
                                            placeholder="Tên sách không không dấu không cách"
                                            value=""
                                            required
                                        />
                                        <div class="invalid-feedback">
                                            Không được bỏ trống đơn vị tính
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label
                                            for="page_number"
                                            class="col-form-label"
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
                                            required
                                        />
                                        <div class="invalid-feedback">
                                            Không được bỏ trống đơn vị tính
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Gia" class="col-form-label"
                                            >Giá:
                                        </label>
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
                                            required
                                        />
                                        <div class="invalid-feedback">
                                            Không được bỏ trống giá
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label
                                            for="SoLuong"
                                            class="col-form-label"
                                            >Số lượng:
                                        </label>
                                        <input
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
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
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
                                        >
                                            <option :value="null">
                                                Chọn ngôn ngữ
                                            </option>
                                            <option
                                                v-for="tamp in ngonngu"
                                                v-bind:value="tamp.ma"
                                            >
                                                {{ tamp.name }}
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="my-1 me-2" for="publisher"
                                            >Nhà xuất bản</label
                                        >
                                        <select
                                            class="form-select"
                                            v-model="selectedNXB"
                                        >
                                            <option :value="null">
                                                Chọn nhà xuất bản
                                            </option>
                                            <option
                                                v-for="tamp in nhaxuatban"
                                                v-bind:value="tamp.ma"
                                            >
                                                {{ tamp.name }}
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
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
                                        >
                                            <option :value="null">
                                                Chọn thể loại:
                                            </option>
                                            <option
                                                v-for="tamp in theloai"
                                                v-bind:value="tamp.ma"
                                            >
                                                {{ tamp.title }}
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label
                                            class="my-1 me-2"
                                            for="publisher"
                                        >
                                            Chọn nhà tác giả</label
                                        >
                                        <select
                                            class="form-select"
                                            v-model="selectedTG"
                                        >
                                            <option :value="null">
                                                Chọn nhà tác giả:
                                            </option>
                                            <option
                                                v-for="tamp in tacgia"
                                                v-bind:value="tamp.ma"
                                            >
                                                {{ tamp.firstname }}
                                                {{ tamp.lastname }}
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="publication_date"
                                            >Ngày xuất bản:</label
                                        >
                                        <div class="input-group">
                                            <span class="input-group-text"
                                                ><svg
                                                    class="icon icon-xs text-gray-600"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"
                                                    ></path>
                                                </svg> </span
                                            ><input
                                                data-datepicker=""
                                                class="form-control datepicker-input"
                                                v-model="publication_date"
                                                id="publication_date"
                                                type="text"
                                                placeholder="dd/mm/yyyy"
                                                required=""
                                            />
                                        </div>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="reprint_date"
                                            >Ngày tái bản:</label
                                        >
                                        <div class="input-group">
                                            <span class="input-group-text"
                                                ><svg
                                                    class="icon icon-xs text-gray-600"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"
                                                    ></path>
                                                </svg> </span
                                            ><input
                                                data-datepicker=""
                                                class="form-control datepicker-input"
                                                v-model="reprint_date"
                                                id="reprint_date"
                                                type="text"
                                                placeholder="dd/mm/yyyy"
                                                required=""
                                            />
                                        </div>
                                        <div class="invalid-feedback">
                                            Không được bỏ trống số lượng
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
                                        <div class="invalid-feedback">
                                            Chưa chọn hình
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
                                        type="submit"
                                    >
                                        Thêm
                                    </button>
                                    <button
                                        type="reset"
                                        class="btn btn-warning text-white"
                                    >
                                        Xoá
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import swal from "sweetalert";
import firebase from "firebase/compat/app";
import "firebase/compat/auth";
import "firebase/compat/firestore";
import { getStorage, ref, uploadString } from "firebase/storage";
import moment from "moment";
export default {
    data() {
        return {
            message: {},
            tacgia: [],
            theloai: [],
            ngonngu: [],
            nhaxuatban: [],
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
            publication_date: "",
            reprint_date: "",
            description: "",
            image: null,
            imagepreview: null,
            filePreview: null,
            picture: null,
            imageData: null,
            uploadValue: 0,
        };
    },
    mounted() {
        this.loadData();
        this.imageSelected();
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
        onUpload() {
            // Create a root reference
            const storage = getStorage();

            // Create a reference to 'mountains.jpg'
            const mountainsRef = ref(storage, this.imageData.name);

            // Create a reference to 'images/mountains.jpg'
            const mountainImagesRef = ref(storage, this.imageData);

            // While the file names are the same, the references point to different files
            mountainsRef.name === mountainImagesRef.name; // true
            mountainsRef.fullPath === mountainImagesRef.fullPath;
        },
        loadData() {
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
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format();
            }
        },
        formSubmit() {
            // alert(moment(this.publication_date).format('YYYY-MM-DD h:mm:ss') + " " + moment(this.reprint_date).format('YYYY-MM-DD h:mm:ss'));
            axios
                .post(`/api/admin/addbook`, {
                    ma: this.ma,
                    title: this.title,
                    slug: this.slug,
                    price: this.price,
                    quantity: this.quantity,
                    sold: 0,
                    images: this.imageData.name,
                    page_number: this.page_number,
                    description: this.description,
                    publication_date: moment(this.publication_date).format('YYYY-MM-YY'),
                    reprint_date: moment(this.reprint_date).format('YYYY-MM-YY'),
                    category_id: this.selectedTL,
                    language_id: this.selectedNN,
                    publisher_id: this.selectedNXB,
                    author_id: this.selectedTG,
                    discount: 0,
                })
                .then((response) => {
                    swal("Thêm thành công!", "", "success");
                })
                .catch(function (error) {
                    console.log(error);
                    this.message = this.error;
                });
            const storage = getStorage();
            const storageRef = ref(storage, this.imageData.name);
            uploadString(storageRef, this.filePreview, "data_url").then(
                (snapshot) => {
                    console.log(snapshot);
                }
            );
        },
    },
};
</script>
<style scoped lang="css">
.container {
    max-width: 600px;
}
.previewBlock {
    display: block;
    cursor: pointer;
    max-height: 100px;
    margin: 20px;
    background-position: center center;
    background-size: cover;
}
</style>
