@extends('layouts.master')  @section('mainRows')     @parent
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Новости</h1>
        </div>
    </div><!--/.row-->

    <div class="row mainRow">
        <table id="example" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Actions</td>
                </tr>
            </thead>

            <tbody>

                <?php
                //print_r($shops);
                ?>
                @foreach($news as $item)
                <tr>
                    <td>{{ $item->id }} </td>
                    @if($item->image)
                        <td><img height="100px" width="300px" src="/images/{{$item->image }}"></td>
                    @else
                        <td>Not found image</td>
                    @endif
                    <td>{{ $item->title }}</td>
                    <td >
                        <a style="float: left" href="/admin/new/{{$item->id}}" class="btn btn-info">Редактировать</a>
                        {!! Form::open(['method'=>'DELETE','action' => array('NewsController@destroy', $item->id),'style'=>'float:left;']) !!}
                        {!! Form::hidden('id', $item->id) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger','']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection