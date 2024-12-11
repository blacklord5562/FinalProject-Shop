@extends('admin.master')
@section('title')
    ایجاد / ویرایش گالری
@endsection
@section('content')
    <div class="row">
        <form action="@if(isset($editing)){{route('admin.update.gallery',['id'=>$editing->id])}}@elseif(!isset($editing)){{route('admin.store.gallery')}}@endif" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-1">
                @if(isset($status,$message))
                    <div @class(['alert w-25','alert-danger'=>$status==false,'alert-success'=>$status==true])>{{$message}}</div>
                @endif
            </div>
            @if(isset($editing))
                <div class="m-1">
                    <img src="{{route('gallery.show' , ['id'=>$editing->id])}}" class="img-thumbnail w-25">
                </div>
            @endif
            <div class="m-1">
                <label class="form-label fw-bold">TITLE:</label>
                <input class="form-control w-25" type="text" name="title" value="@if(isset($editing)){{$editing->title}} @endif">
                @error('title')
                <div class="alert alert-danger w-50">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label class="form-label fw-bold">STATUS:</label><br>
                <label class="form-label fw-bold" for="st1">avaiable</label>
                <input class="form-radio-control" name="status" type="radio" value="1" id="st1" @if(isset($editing) && $editing->status==1){{'checked'}}@endif><br>
                <label class="form-label fw-bold" for="st2">unavaiable</label>
                <input class="form-radio-control" name="status" type="radio" value="0" id="st2" @if(isset($editing) && $editing->status==0){{'checked'}}@endif>
                @error('status')
                <div class="alert alert-danger w-50">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label class="form-label">DESCRIPTION:</label>
                <textarea class="form-control w-25" name="description" type="text">@if(isset($editing)){{$editing->description}} @endif</textarea>
                @error('description')
                <div class="alert alert-danger w-50">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label class="form-label">MENU:</label>
                <select class="form-select w-25" name="menu_id">
                    @if(isset($menus))
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}" @if(isset($editing) && $menu->id==$editing->menu_id) selected @endif>{{$menu->title}}</option>
                        @endforeach @endif
                </select>
                @error('menu_id')
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
