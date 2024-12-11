@extends('admin.master')
@section('title')
    ایجاد / ویرایش عکس
@endsection
@section('content')
    <div class="row">
        <form action="@if(isset($editing)){{route('picturegal.update',['id'=>$editing->id])}}@elseif(!isset($editing)){{route('picturegal.store')}}@endif" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-1">
                @if(isset($status,$message))
                    <div @class(['alert w-25','alert-danger'=>$status==false,'alert-success'=>$status==true])>{{$message}}</div>
                @endif
            </div>
            @if(isset($editing))
                <div class="m-1">
                    <img src="{{route('picturegal.show' , ['id'=>$editing->id])}}" class="img-thumbnail w-25">
                </div>
            @endif
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
                <label>FILE:</label>
                <input type="file" name="fl" formenctype="multipart/form-data" class="form-control w-25">
                @error('fl')
                <div class="alert alert-danger w-50">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label class="form-label">GALLERY:</label>
                <select class="form-select w-25" name="gallery_id">
                    @if(isset($galleries))
                        @foreach($galleries as $gallery)
                            <option value="{{$gallery->id}}" @if(isset($editing) && $gallery->id==$editing->gallery_id) selected @endif>{{$gallery->title}}</option>
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
