@extends('admin.master')
@section('title')
    ایجاد / ویرایش صفحه
@endsection
@section('content')
    <div class="row">
        <form action="@if(isset($editing)){{route('page.update',['id'=>$editing->id])}}@elseif(!isset($editing)){{route('page.store')}}@endif" method="POST">
            @csrf
            <div class="m-1">
                @if(isset($status,$message))
                    <div @class(['alert w-25','alert-danger'=>$status==false,'alert-success'=>$status==true])>{{$message}}</div>
                @endif
            </div>
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
            </div>
            <div class="m-1">
                <label class="form-label">MENU:</label>
                <select class="form-select w-25" name="menu_id">
                    @if(isset($menus))
                        @foreach($menus as $menu)
                            <option @if(isset($editing) && $editing->menu_id==$menu->id) selected @endif value="{{$menu->id}}">{{$menu->title}}</option>
                        @endforeach @endif
                </select>
            </div>
            <div class="m-1 mb-3">
                <input type="submit" name="save" value="save" class="btn btn-success rounded-3">
            </div>
        </form>
    </div>
@endsection
