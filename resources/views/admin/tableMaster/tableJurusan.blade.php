@extends('admin.tableMaster.tableTemplate')

@section('table-content')

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr role="row">
            <th style="width: 10px">
                <input type="checkbox" id="checkall" class="filled-in chk-col-red"/>
                <label for="checkall"></label>
            </th>
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                Nama Jurusan
            </th>
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                Alias
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $key=>$jurusan)
            <tr>
                <td>
                    <input id="check{{$jurusan->id}}" type="checkbox" value="{{$jurusan->id}}" class="filled-in chk-col-red table_check"/>
                    <label for="check{{$jurusan->id}}"></label>
                </td>
                <td class="view-info" row_id="{{ $jurusan->id }}">
                    {{$jurusan->nama_jurusan}}
                </td>
                <td class="view-info" row_id="{{ $jurusan->id }}">
                    {{$jurusan->alias}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="dataTables_paginate paging_simple_numbers pull-right" id="DataTables_Table_1_paginate">
    <ul class="pagination">
        {{ $datas->links() }}
    </ul>
</div>

@endsection