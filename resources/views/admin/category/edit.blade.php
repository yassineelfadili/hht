@extends('layouts.main')
@section('title', __('Category Edit'))
@section('content')
    <!-- push external head elements to head -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Edit Category')}}</h5>
                            <span>{{ __('Edit category')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">{{ __('Category')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach (allLanguages() as $lang)
                            <div class="form-group">
                                <label for="name">{{ __('Category Name('.$lang->name.')') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name_{{$lang->prefix}}" placeholder="{{ __('Category name here') }}" value="{{ $category->translateOrDefault($lang->prefix)->name }}">
                                <span class="text-danger">{{ __($errors->first('name')) }}</span>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
