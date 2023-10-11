@extends('admin.master')
@section('content')
    <main class="page-content">

        <section class="wrapper">
            <div class="panel-panel-default">
                <div class="market-updates">
                    <div class="container">
                        <div class="page-inner">
                            <header class="page-title-bar">

                                <h1 class="offset-4">Change information</h1>
                            </header>
                            <div class="page-section">
                                <form action="{{ route('user.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <legend>Basic information</legend>
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="tf1">Email<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="email" type="text" class="form-control"
                                                            value="{{ $user->email }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('email')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">First and last name<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="name" type="text" class="form-control"
                                                            value="{{ $user->name }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">Phone number<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="phone" type="number" class="form-control"
                                                            value="{{ $user->phone }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('phone')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">Date of birth<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="birthday" type="date" class="form-control"
                                                            value="{{ $user->birthday }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('birthday')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    @if (Auth::user()->hasPermission('Group_update'))
                                                        <label class="control-label" for="flatpickr01">Position<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <select name="group_id" id="" class="form-control">
                                                            <option value="">--Please choose--</option>
                                                            @foreach ($groups as $group)
                                                                <option
                                                                    <?= $group->id == $user->group_id ? 'selected' : '' ?>
                                                                    value="{{ $group->id }}">
                                                                    {{ $group->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ('group_id')
                                                            <p style="color:red">{{ $errors->first('group_id') }}</p>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="control-label" for="flatpickr01">Gender<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <select name="gender" id="" value="{{ $user->gender }}"
                                                        class="form-control">
                                                        <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                        <option value="Nam">Male</option>
                                                        <option value="Nữ">Female</option>
                                                        <option value="Khác">Other</option>
                                                    </select>
                                                    @if ('gender')
                                                        <p style="color:red">{{ $errors->first('gender') }}</p>
                                                    @endif
                                                </div>
                                                <div class="form-group has-warning">
                                                    <label class="col-lg-3 control-label">Image</label>
                                                    <div class="col-lg-4">
                                                        <input accept="image/*" type='file' value="{{ $user->image }}"
                                                            id="inputFile" name="image" /><br>
                                                        <img type="hidden" width="90px" height="90px" id="blah1"
                                                            src="{{ asset($user->image) ?? asset($request->image) }}"
                                                            alt="" />
                                                        @if ('image')
                                                            <p style="color:red">{{ $errors->first('image') }}</p>
                                                        @endif
                                                        <br>
                                                    </div>
                                                </div>

                                                {{-- địa chỉ --}}
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="tf1">Address><abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="address" type="text" class="form-control"
                                                            value="{{ $user->address }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('address')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <br>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <br><br><br><br>
                                                <button class="btn btn-success" type="submit">Save changes</button>
                                                <a class="btn btn-danger" href="{{ route('user.index') }}">Hủy</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
