@extends('admin.master')
@section('title')
    ایجاد / ویرایش کالا
@endsection
@section('content')
    <div class="row">
        <form action="{{route('product.create')}}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="m-1">
                @if(isset($status,$message))
                    <div @class(['alert w-25','alert-danger'=>$status==false,'alert-success'=>$status==true])>{{$message}}</div>
                @endif
            </div>
            <div class="m-1">
                <label class="form-label">لطفا کتگوری مورد نظر را انتخاب کنید:</label>
                <select class="form-select w-25" name="category_id">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(isset($editing) && $category->id==$editing->category_id) selected @endif>{{$category->title}}</option>
                        @endforeach @endif
                </select>
                @error('category_id')
                <div class="alert alert-danger w-50">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1 mb-3">
                <input type="submit" name="save" value="save" class="btn btn-success rounded-3">
            </div>
        </form>
    </div>
@endsection
