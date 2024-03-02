@section('title', 'Dashboard')
@extends('main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users Lists</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#"
                                    class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                        class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="{{ route('users.create') }}" class="btn btn-white btn-outline-light">
                                                <em class="icon ni ni-download-cloud"></em>
                                                <span>Add User</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-tools">
                            <div class="form-inline flex-nowrap gx-3">
                                <div class="form-wrap w-150px"><select class="form-select js-select2" data-search="off"
                                        data-placeholder="Bulk Action">
                                        <option value="">Bulk Action</option>
                                        <option value="email">Send Email</option>
                                        <option value="group">Change Group</option>
                                        <option value="suspend">Suspend User</option>
                                        <option value="delete">Delete User</option>
                                    </select></div>
                            </div>
                        </div> --}}
                        {{-- <div class="card-tools me-n1">
                            <ul class="btn-toolbar gx-1">
                                <li><a href="#" class="btn btn-icon search-toggle toggle-search"
                                        data-target="search"><em class="icon ni ni-search"></em></a></li>
                                <li class="btn-toolbar-sep"></li>
                                <li>
                                    <div class="toggle-wrap"><a href="#" class="btn btn-icon btn-trigger toggle"
                                            data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                        <div class="toggle-content" data-content="cardTools">
                                            <ul class="btn-toolbar gx-1">
                                                <li class="toggle-close"><a href="#"
                                                        class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em
                                                            class="icon ni ni-arrow-left"></em></a>
                                                </li>
                                                <li>
                                                    <div class="dropdown"><a href="#"
                                                            class="btn btn-trigger btn-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown">
                                                            <div class="dot dot-primary">
                                                            </div><em class="icon ni ni-filter-alt"></em>
                                                        </a>
                                                        <div
                                                            class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <div class="dropdown-head"><span
                                                                    class="sub-title dropdown-title">Filter
                                                                    Users</span>
                                                                <div class="dropdown"><a href="#"
                                                                        class="btn btn-sm btn-icon"><em
                                                                            class="icon ni ni-more-h"></em></a>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-body dropdown-body-rg">
                                                                <div class="row gx-6 gy-3">
                                                                    <div class="col-6">
                                                                        <div
                                                                            class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="hasBalance"><label
                                                                                class="custom-control-label"
                                                                                for="hasBalance">
                                                                                Have
                                                                                Balance</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div
                                                                            class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="hasKYC"><label
                                                                                class="custom-control-label" for="hasKYC">
                                                                                KYC
                                                                                Verified</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="overline-title overline-title-alt">Role</label><select
                                                                                class="form-select js-select2">
                                                                                <option value="any">
                                                                                    Any Role
                                                                                </option>
                                                                                <option value="investor">
                                                                                    Investor
                                                                                </option>
                                                                                <option value="seller">
                                                                                    Seller
                                                                                </option>
                                                                                <option value="buyer">
                                                                                    Buyer
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="overline-title overline-title-alt">Status</label><select
                                                                                class="form-select js-select2">
                                                                                <option value="any">
                                                                                    Any
                                                                                    Status
                                                                                </option>
                                                                                <option value="active">
                                                                                    Active
                                                                                </option>
                                                                                <option value="pending">
                                                                                    Pending
                                                                                </option>
                                                                                <option value="suspend">
                                                                                    Suspend
                                                                                </option>
                                                                                <option value="deleted">
                                                                                    Deleted
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <button type="button"
                                                                                class="btn btn-secondary">Filter</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-foot between">
                                                                <a class="clickable" href="#">Reset
                                                                    Filter</a><a href="#">Save Filter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dropdown"><a href="#"
                                                            class="btn btn-trigger btn-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-setting"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li class="active"><a href="#">10</a></li>
                                                                <li><a href="#">20</a></li>
                                                                <li><a href="#">50</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Order</span></li>
                                                                <li class="active"><a href="#">DESC</a>
                                                                </li>
                                                                <li><a href="#">ASC</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="card-inner">
                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100" data-auto-responsive="true">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">User ID</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                {{-- <th class="nk-tb-col tb-col-mb"><span class="sub-text">Role</span></th> --}}
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Contact</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Shop Name</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Date Time</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    {{-- <td>{{ $value->role }}</td> --}}
                                    <td>{{ $value->contact }}</td>
                                    <td>{{ $value->shop_name }}</td>
                                    <td>{{ $value->address }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td style="min-width:200px">
                                        <select id="actions_users" class="form-control">
                                            <option value="" disabled selected>Select Option</option>
                                            <option data-route="{{ route('users.show', $value->id) }}" value="view">View
                                                User</option>
                                            <option data-route="{{ route('users.edit', $value->id) }}" value="edit">Edit
                                                User</option>
                                            <option data-route="{{ route('users.show', $value->id) }}/delete"
                                                value="delete">
                                                Delete User</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
