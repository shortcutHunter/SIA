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
                NIP
            </th>
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                Nama Dosen
            </th>
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                Email
            </th>
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                Status
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $key=>$data)
            <tr>
                <td>
                    <input id="check{{$data->id}}" type="checkbox" value="{{$data->id}}" class="filled-in chk-col-red table_check"/>
                    <label for="check{{$data->id}}"></label>
                </td>
                <td class="view-info" row_id="{{ $data->id }}">
                    {{$data->nip}}
                </td>
                <td class="view-info" row_id="{{ $data->id }}">
                    {{$data->nama_dosen}}
                </td>
                <td class="view-info" row_id="{{ $data->id }}">
                    {{$data->email}}
                </td>
                <td class="view-info" row_id="{{ $data->id }}">
                    {{$data->master_status_kerja_dosen->nama_status_kerja}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection