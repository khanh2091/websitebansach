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
                            <i class="fas fa-home" style="height: 10px;width: 10px;"></i>
                        </router-link>
                    </li>
                    <li style="float: left;">/</li>
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
                <a
                    href="#"
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
                </a>
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
                                <th>Id</th>
                                <th>Id</th>
                                <th>Id</th>
                                <th>Id</th>
                                <th>Chuc nang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>

                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>2</td>
                                <td class="col-sm-1">
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <a
                                            href="#"
                                            class="btn btn-primary btn-sm float-left btn-circle"
                                            data-toggle="tooltip"
                                            title="Xem"
                                            data-placement="bottom"
                                            ><i class="fas fa-info-circle"></i
                                        ></a>
                                        <a
                                            href="#"
                                            class="btn btn-warning btn-sm float-left mx-2 btn-circle text-white"
                                            data-toggle="tooltip"
                                            title="Sửa"
                                            data-placement="bottom"
                                            ><i class="fas fa-edit"></i
                                        ></a>
                                        <form method="POST" action="#">
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-sm btn-circle btnDelete"
                                                data-id=""
                                                data-toggle="tooltip"
                                                data-placement="bottom"
                                                title="Xoá"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <input
                                                type="text"
                                                id="makh"
                                                name="makh"
                                                value="#"
                                                hidden
                                            />
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
