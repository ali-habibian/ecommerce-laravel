@extends('layouts.admin.app')

@section('title', 'ویرایش نقش')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.roles.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>ویرایش نقش</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">نقش ها</a></div>
                <div class="breadcrumb-item">ویرایش نقش</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">ویرایش نقش</h2>
            <p class="section-lead">
                شما می توانید نقش های جدید را ویرایش کنید و به آنها مجوز اختصاص دهید
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>نقش</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.roles.update', $role) }}"
                                      method="POST">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group">
                                        <label for="name"
                                               class="label form-control-label">اسم</label>
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $role->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="guard"
                                               class="label form-control-label">گارد</label>
                                        <input type="text"
                                               name="guard"
                                               id="guard"
                                               placeholder="web"
                                               class="form-control @error('guard') is-invalid @enderror"
                                               value="{{ old('guard', $role->guard_name) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">ذخیره تغییرات</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="border"></div>
        <div class="section-body">
            <h2 class="section-title">مجوز ها</h2>
            <p class="section-lead">
                اختصاص مجوز به این نقش
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>مجوز ها</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.roles.permissions.assign', $role) }}"
                                      method="POST">
                                    @csrf

                                    @foreach ($permissions->groupBy(fn($permission) => Str::plural(Str::afterLast($permission->name, ' '))) as $model => $modelPermissions)
                                        <div class="form-group">
                                            <label class="form-label">
                                                {{ Str::title($model) }}
                                            </label>

                                            <div class="selectgroup selectgroup-pills">
                                                @foreach ($modelPermissions as $permission)
                                                    <label class="selectgroup-item mb-3">
                                                        <input type="checkbox"
                                                               name="permissions[{{ $permission->name }}]"
                                                               value="{{ $permission->name }}"
                                                               class="selectgroup-input"
                                                            {{ $role->hasPermissionTo($permission) || collect(old('permissions', []))->has($permission->name) ? 'checked' : '' }}>

                                                        <span class="selectgroup-button">{{ $permission->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">ذخیره تغییرات
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
