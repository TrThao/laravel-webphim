@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm Phim</a>
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Phim</th>
                            <th scope="col">Tên Tiếng Anh</th>
                            <th scope="col">Thời Lượng Phim</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Phim Hot</th>
                            <th scope="col">Định Dạng</th>
                            <th scope="col">Phụ Đề</th>
                            {{-- <th scope="col">Mô Tả</th> --}}
                            <th scope="col">Đường Dẫn</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Danh Mục</th>
                            <th scope="col">Thuộc Phim</th>
                            <th scope="col">Thể Loại</th>
                            <th scope="col">Quốc Gia</th>
                            <th scope="col">Số Tập</th>
                            <th scope="col">Ngày Tạo</th>
                            <th scope="col">Ngày Cập Nhật</th>
                            <th scope="col">Tags Phim</th>
                            <th scope="col">Năm Phim</th>
                            <th scope="col">Top Views</th>
                            <th scope="col">Season</th>
                            <th scope="col">Quản Lý</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->name_eng }}</td>
                                <td>{{ $cate->thoiluong }}</td>
                                <td> <img width="70%" src="{{ asset('uploads/movie/' . $cate->image) }}"></td>
                                <td>
                                    @if ($cate->phim_hot == 0)
                                        Không Hot
                                    @else
                                        Hot
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->resolution == 0)
                                        HD
                                    @elseif($cate->resolution == 1)
                                        SD
                                    @elseif($cate->resolution == 2)
                                        HDcam
                                    @elseif($cate->resolution == 3)
                                        Cam
                                    @elseif($cate->resolution == 4)
                                        Full HD
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->phude == 0)
                                        Vietsub
                                    @else
                                        Thuyết Minh
                                    @endif
                                </td>
                                {{-- <td>{{ $cate->description }}</td> --}}
                                <td>{{ $cate->slug }}</td>
                                <td>
                                    @if ($cate->status)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td>
                                <td>{{ $cate->category->title }}</td>
                                   <td> @if($cate->thuocphim == 'phimle')
                                        Phim Lẻ
                                        @else
                                        Phim Bộ
                                        @endif

                                   </td>

                                <td>
                                    @foreach ($cate->movie_genre as $gen)
                                      <span class="badge badge-danger" style="background-color: black"> {{ $gen->title }}</span> 
                                    @endforeach
                                </td>
                                <td>{{ $cate->country->title }}</td>
                                <td>{{ $cate->sotap }}</td>
                                <td>{{ $cate->ngaytao }}</td>
                                <td>{{ $cate->ngaycapnhat }}</td>
                                <td>{{ $cate->tags }}</td>
                                <td>

                                    {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', [
                                        'class' => 'select-year',
                                        'id' => $cate->id,
                                    ]) !!}

                                </td>
                                <td>
                                    {!! Form::select(
                                        'topview',
                                        ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'],
                                        isset($cate->topview) ? $cate->topview : '',
                                        [
                                            'class' => 'select-topview',
                                            'id' => $cate->id,
                                        ],
                                    ) !!}
                                </td>

                                <td>

                                    {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', [
                                        'class' => 'select-season',
                                        'id' => $cate->id,
                                    ]) !!}

                                </td>


                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Xóa hay không ?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
