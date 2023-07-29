@extends('admin.layout')
@section('page_title','Administrators')
@section('administrators_select','active')
@section('container')
<div class="main-content">
 <div class="user-data m-b-10">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-circle"></i>Administrators</h3>
    <div class="table-responsive table-data">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Type</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminArr as $admin)

                @endforeach
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <span class="role admin">admin</span>
                    </td>
                    <td>
                        <div class="">
                            Full Control
                        </div>
                    </td>
                    {{-- <td>
                        <span class="more">
                            <i class="zmdi zmdi-more"></i>
                        </span>
                    </td> --}}
                </tr>

            </tbody>
        </table>
    </div>
    </div>
 </div>
</div>

</div>

@endsection
