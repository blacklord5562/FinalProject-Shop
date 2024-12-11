@extends('admin.master')
@section('title')
    لیست عکس ها
@endsection
@section('content')
    <div class="table-responsive px-2">
        <table class="table table-striped table-hover text-center">
            <thead>
            <tr class="fw-bold ">
                <td>description</td>
                <td>status</td>
                <td>gallery</td>
                <td>picture</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $dataresult)
                <tr>
                    <td>{{$dataresult->description}}</td>
                    <td><div @class(['badge','text-white','bg-success'=>$dataresult->status==1,'bg-secondary'=>$dataresult->status==0])>@if($dataresult->status==0){{'unavaiable'}}@elseif($dataresult->status==1){{'avaiable'}}@endif</div></td>
                    @foreach($galleries as $gallery)
                        @if($dataresult->gallery_id==$gallery->id)<td>{{$gallery->title}}</td> @endif
                    @endforeach
                    <td><img class="img-thumbnail w-25" src="{{route('picturegal.show' , ['id'=>$dataresult->id])}}"></td>
                    <td><a class="btn bg-info" href="{{route('picturegal.edit',['id'=>$dataresult->id])}}"><i class="fa fa-edit"></i></a></td>
                    <td><form action="{{route('picturegal.destroy',['id'=>$dataresult->id])}}" method="POST">
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
