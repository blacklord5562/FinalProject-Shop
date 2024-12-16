@extends('admin.master')
@section('title')
    ایجاد / ویرایش منو
@endsection
@section('content')
    <div class="row">
        <form action="{{ isset($editing) && $editing ? route('menu.update', ['id' => $editing->id]) : route('menu.store') }}" method="POST">
            @csrf
            <div class="m-1">
                @if(isset($status, $message))
                    <div class="alert w-25 {{ $status ? 'alert-success' : 'alert-danger' }}">
                        {{ $message }}
                    </div>
                @endif
            </div>

            <div class="m-1">
                <label class="form-label fw-bold">TITLE:</label>
                <input
                    class="form-control w-25"
                    type="text"
                    name="title"
                    value="{{ old('title', isset($editing) && $editing ? $editing->title : '') }}"
                    required>
                @error('title')
                <div class="alert alert-danger w-50">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="m-1">
                <label class="form-label fw-bold">URL:</label>
                <input
                    class="form-control w-25"
                    type="text"
                    name="url"
                    placeholder="e.g., / or /products"
                    value="{{ old('url', isset($editing) && $editing ? $editing->url : '') }}"
                    required>
                @error('url')
                <div class="alert alert-danger w-50">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="m-1">
                <label class="form-label fw-bold">STATUS:</label><br>
                <div>
                    <label class="form-label fw-bold" for="st1">Available</label>
                    <input
                        class="form-radio-control"
                        name="status"
                        type="radio"
                        value="1"
                        id="st1"
                        {{ isset($editing) && $editing && $editing->status == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    <label class="form-label fw-bold" for="st2">Unavailable</label>
                    <input
                        class="form-radio-control"
                        name="status"
                        type="radio"
                        value="0"
                        id="st2"
                        {{ isset($editing) && $editing && $editing->status == 0 ? 'checked' : '' }}>
                </div>
                @error('status')
                <div class="alert alert-danger w-50">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="m-1 mb-3">
                <input
                    type="submit"
                    name="save"
                    value="Save"
                    class="btn btn-success rounded-3">
            </div>
        </form>
    </div>
@endsection
