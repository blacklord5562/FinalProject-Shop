@extends('admin.master')
@section('title')
    لیست کالا ها
@endsection
@section('content')
    <div class="table-responsive px-2">
        <table class="table table-striped table-hover text-center">
            <thead>
            <tr class="fw-bold ">
                <td>شناسه کالا</td>
                <td>نام کالا</td>
                <td>توضیحات</td>
                <td>وضعیت کالا</td>
                <td>عکس کالا</td>
                <td>قیمت</td>
                <td>تخفیف</td>
                <td>دسته بندی</td>
                <td>انقضا قیمت</td>
                <td>ویژگی ها</td>
                <td>ویرایش</td>
                <td>حذف</td>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $dataresult)
                <tr>
                    <td>{{$dataresult->id}}</td>
                    <td>{{$dataresult->title}}</td>
                    <td>{{$dataresult->description}}</td>
                    <td><div @class(['badge','text-white','bg-success'=>$dataresult->status==1,'bg-secondary'=>$dataresult->status==0])>@if($dataresult->status==0){{'unavaiable'}}@elseif($dataresult->status==1){{'avaiable'}}@endif</div></td>
                    <td><img class="img-thumbnail w-25" src="{{route('product.show' , ['id'=>$dataresult->id])}}"></td>
                    <td>{{$dataresult->price}}</td>
                    <td>{{$dataresult->discount}}</td>
                    @foreach($cat as $ct)
                      @if($ct->id==$dataresult->category_id)
                            <td>{{$ct->title}}</td>
                      @endif
                    @endforeach

                    <td>date</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">ویژگی ها <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                    <?php
                                                              $ap=$dataresult->attributes()->where('product_id',$dataresult->id)->get(['value','attribute_id']);
                                                          ?>
                                @foreach($attributes as $att)
                                        @if($att->category_id==$dataresult->category_id)
                                        @foreach($ap as $a)
                                            @if($att->id==$a->attribute_id)
                                            <li>{{$att->title.':'.$a->value}}</li>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                            </ul>
                        </div>
                    </td>
                    <td><a class="btn bg-info" href="{{route('product.edit',['id'=>$dataresult->id])}}"><i class="fa fa-edit"></i></a></td>
                    <td><form action="{{route('product.destroy',['id'=>$dataresult->id])}}" method="POST">
                            @csrf @method('delete')
                            <input type="hidden" name="id" value="{{$dataresult->id}}">
                            <button type="submit" class="btn btn-danger " title="حذف" onclick="checkdelete()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        checkdelete=()=>{
            if(confirm('are you sure?'))
                return true;
            else{
                event.preventDefault();
            }
        }
    </script>
@endsection
