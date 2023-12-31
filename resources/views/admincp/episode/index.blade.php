@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Phim</th>
                             <th scope="col">Hình ảnh Phim</th>
                            <th scope="col">Tập Phim</th>
                            <th scope="col">Link Phim</th>
                            {{-- <th scope="col">Trạng Thái</th> --}}
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list_episode as $key => $episode)
                        
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $episode->movie->title }}</td>
                                 <td> <img width="70%" src="{{ asset('uploads/movie/' . $episode->movie->image) }}"></td>
                                <td>{{ $episode->episode }}</td>
                                <td>{!! $episode->linkphim !!}</td>
                                {{-- <td>
                                    @if ($cate->status)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td> --}}
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['episode.destroy', $episode->id],
                                        'onsubmit' => 'return confirm("Xóa hay không ?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('episode.edit', $episode->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
