@extends('admin.master')
@section('title')
    ایجاد / ویرایش کالا
@endsection
@section('content')
    @if(isset($cat))
    <div class="row">
        <form action="@if(isset($editing)){{route('product.update',['id'=>$editing->id])}}@else{{route('product.store')}}@endif" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-1">
                @if(isset($status,$message))
                    <div @class(['alert w-25','alert-danger'=>$status==false,'alert-success'=>$status==true])>{{$message}}</div>
                @endif
            </div>
            @if(isset($editing))
                <div class="m-1">
                    <img src="{{route('product.show' , ['id'=>$editing->id])}}" class="img-thumbnail w-25">
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

                <input type="hidden" value="{{$cat}}" name="cat">
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
                <label class="form-label">PRICE:</label>
                <input type="text" name="price" class="form-control w-25" @if(isset($editing))value="{{$editing->price}}" @endif>
                @error('price')
                <div class="alert alert-danger w-25">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label class="form-label">DISCOUNT(%):</label>
                <input type="text" name="discount"  class="form-control w-25" @if(isset($editing))value="{{$editing->disount}}" @endif>
                @error('discount')
                <div class="alert alert-danger w-25">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                <label>FILE:</label>
                <input type="file" name="fl" formenctype="multipart/form-data" class="form-control w-25">
                @error('fl')
                <div class="alert alert-danger w-25">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-1">
                    @if(isset($attributes))
                        @foreach($attributes as $attribute)
                            <label class="form-label">{{$attribute->title}}:</label>
                            @if(isset($a_p))
                                @foreach($a_p as $ap)
                                    @if($attribute->id==$ap->attribute_id)
                                        <input type="text" class="form-control w-25" name="{{$attribute->title}}" @if(isset($editing))value="{{$ap->value}}" @endif>
                                   @endif
                                @endforeach
                            @else
                                <input type="text" class="form-control w-25" name="{{$attribute->title}}">
                           @endif
                        @endforeach
                    @endif
                @error('attribute_id')
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
    @endif
@endsection
