@extends('admin.master')
@section('title')
    لیست صفت ها
@endsection
@section('content')
    <div class="table-responsive px-2">
        <table class="table table-striped table-hover text-center">
            <thead>
            <tr class="fw-bold ">
                <td>category</td>
                <td>attribute</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            @foreach($categories as $category)
            <tbody>
            @foreach($data as $dataresult)
                <tr>
                        @if($dataresult->category_id==$category->id)<td>{{$category->title}}</td>
                        <td>{{$dataresult->title}}</td>
                        <td><a class="btn bg-info" href="{{route('category.edit',['category'=>$dataresult->id])}}"><i class="fa fa-edit"></i></a></td>
                    <td><form action="{{route('attribute.destroy',['attribute'=>$dataresult->id])}}" method="POST">
                            @csrf @method('delete')
                            <input type="hidden" name="id" value="{{$dataresult->id}}">
                            <button type="submit" class="btn btn-danger " title="حذف" onclick="checkdelete()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form></td>
                    @endif
                </tr>

            @endforeach
            </tbody>
            @endforeach
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
