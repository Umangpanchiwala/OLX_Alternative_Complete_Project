@extends('admin.layout')
@section('page_title','user')
@section('user_select','active')
@section('container')
<div class="main-content">
 <div class="user-data m-b-10">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-circle"></i>Users</h3>
    <div class="table-responsive table-data">
        <table class="table table-bordered">
            <thead  class="table-dark">
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>


                </tr>
            </thead>
            <tbody>
                @foreach ($userArr as $user)


                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>


                    <td>
                        <span class="role user">user</span>
                    </td>

                    {{-- <td>
                        <span class="more">
                            <i class="zmdi zmdi-more"></i>
                        </span>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
 </div>
</div>

</div>

@endsection
