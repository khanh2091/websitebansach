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
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.ma != null"
                                    >
                                        {{ errors.ma }}
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="title" class="col-form-label"
                                        >Tên sách:
                                    </label>
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
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.title != null"
                                    >
                                        {{ errors.title }}
                                    </div>
                                </div>
                                <div class="row">
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
                                            :class="{
                                                'is-invalid':
                                                    errors.page_number != null,
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
                                            :class="{
                                                'is-invalid':
                                                    errors.price != null,
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
                                        <label
                                            for="SoLuong"
                                            class="col-form-label"
                                            >Số lượng:
                                        </label>
                                        <input
                                            :class="{
                                                'is-invalid':
                                                    errors.quantity != null,
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
                                                'is-invalid':
                                                    errors.selectedNN != null,
                                            }"
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
                                                'is-invalid':
                                                    errors.selectedNXB != null,
                                            }"
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
                                                'is-invalid':
                                                    errors.selectedTL != null,
                                            }"
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
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.selectedTL != null"
                                        >
                                            {{ errors.selectedTL }}
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
                                            :class="{
                                                'is-invalid':
                                                    errors.selectedTG != null,
                                            }"
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
                                            <label for="company"
                                                >Ngày xuất bản:</label
                                            >
                                            <br />
                                            <date-picker
                                                :class="{
                                                    'is-invalid':
                                                        errors.publication_date !=
                                                        null,
                                                }"
                                                v-model="publication_date"
                                                placeholder="Chọn ngày"
                                                valueType="format"
                                            ></date-picker>
                                            <div
                                                class="invalid-feedback"
                                                v-if="
                                                    errors.publication_date !=
                                                    null
                                                "
                                            >
                                                {{ errors.publication_date }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="company"
                                                >Ngày tái bản:</label
                                            >
                                            <br />
                                            <date-picker
                                                :class="{
                                                    'is-invalid':
                                                        errors.publication_date !=
                                                        null,
                                                }"
                                                v-model="reprint_date"
                                                placeholder="Chọn ngày"
                                                valueType="format"
                                            ></date-picker>
                                            <div
                                                class="invalid-feedback"
                                                v-if="
                                                    errors.reprint_date != null
                                                "
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
                                            :class="{
                                                'is-invalid':
                                                    errors.imageData != null,
                                            }"
                                            class="form-control"
                                            ref="fileInput"
                                            type="file"
                                            id="formFileLg"
                                            @input="selectImgFile"
                                            required
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.imageData != null"
                                        >
                                            {{ errors.imageData }}
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
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import "bootstrap";
import axios from "axios";
import swal from "sweetalert";
import firebase from "firebase/compat/app";
import "firebase/compat/auth";
import "firebase/compat/firestore";
import { getStorage, ref, uploadString } from "firebase/storage";
import moment from "moment";
export default {
    components: { DatePicker },
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
            publication_date: null,
            reprint_date: null,
            description: "",
            image: null,
            imagepreview: null,
            filePreview: null,
            picture: null,
            imageData: null,
            uploadValue: 0,
            errors: [],
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
            }
            if (this.imageData == null) {
                this.errors.imageData = "Chưa chọn hình";
            }
            if( this.quantity <= 0){
                this.errors.quantity = "Không được phép nhập số âm";
            }
            if (
                moment(String(this.publication_date)).format("MMM Do YY") <=
                moment(String(this.reprint_date)).format("MMM Do YY")
            ) {
                this.errors.publication_date = "Ngày xuất bản lớn ngày tái bản";
                this.errors.reprint_date = "Ngày tái bản nhỏ ngày xuất bản";
            } 
            // if (this.imageData == null) {
            //    swal("Lỗi! ", "Chưa chọn hình!");
            // }
            else {
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
                        publication_date: this.publication_date,
                        reprint_date: this.reprint_date,
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
            }
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
