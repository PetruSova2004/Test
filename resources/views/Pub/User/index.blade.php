<!DOCTYPE html>
<html lang="en">
@include('Pub.layouts.parts.header_settings')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('Pub.layouts.parts.sidebar')
    <div class="content-wrapper">

        @include('Pub.layouts.parts.wrapper')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body table-responsive p-0 usersTable">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Login</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($users->count())
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->login}}</td>
                                                    <td>{{$user->gender}}</td>
                                                    <td>{{$user->birthdate}}</td>
                                                    <td>
                                                        <form
                                                            action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt">Delete</i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($users->count() < 1)
                                            <h2>You are the only registered user</h2>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>


                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


@include('Pub.layouts.parts.footer_settings')

<script src="/plugins/customFiles/post-index.js"></script>

</body>
</html>
