@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <?php
        if($error == ""){
          Alert::success('Success Title', 'Success Message');
        }else{
          Alert::error('Error Message', $error);
        }
      ?>
    @endforeach
    </ul>
  </div>
@endif
@section('content')
{{ Form::open(array('url' => 'saveregisteruser')) }}
  <!-- ======================================================= -->
  <!-- INI MENU UTAMA-->
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Pegawai</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newregisteruser'); !!}">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th>Username/Password</th>
                <th>Email / Nama</th>
                <th>Hp/Telp</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($datauser as $row)
              <tr>
                <td>{{$row->username}}</td>
                <td>{{$row->email}}<br>{{$row->nama}}</td>
                <td>{{$row->handphone}}<br>{{'(024)'.$row->telepon}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->status}}</td>
                @php($username  = $row->username)
                @php($email     = $row->email)
                @php($password  = $row->password)
                @php($nama      = $row->nama)
                @php($alamat    = $row->alamat)
                @php($telepon   = $row->telepon)
                @php($handphone = $row->handphone)
                @php($noktp     = $row->noktp)
                @php($role      = $row->role)
                @php($status    = $row->status)
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updatedata('{!! $username !!}','{!! $email !!}','{!! $password !!}','{!! $nama !!}','{!! $alamat !!}','{!! $telepon !!}','{!! $handphone !!}','{!! $noktp !!}','{!! $role !!}','{!! $status !!}')" href="#modal_update">EDIT</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $datauser->links() }}
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container">
          <div class="row">
            <div class="col-1-2">Username :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupusername', '', ['id'=>'txtupusername','','class'=>'validate','readonly'=>'readonly'])}}
            </div>
          </div>
        </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">Email :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtupemail', '', ['id'=>'txtupemail','','class'=>'validate'])}}
                  </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">Password :</div>
              </div> 
              <div class="row">
                  <div class=" col-3-2">
                  {{Form::text('txtuppassword', '', ['id'=>'txtuppassword','','class'=>'validate'])}}
                  </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">Nama :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtupnama', '', ['id'=>'txtupnama','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Alamat :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtupalamat', '', ['id'=>'txtupalamat','','class'=>'validate'])}}
                  </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">Telepon :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtuptelepon', '', ['id'=>'txtuptelepon','','class'=>'validate'])}}
                  </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">Hp :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtuphandphone', '', ['id'=>'txtuphandphone','','class'=>'validate'])}}
                  </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                  <div class="col-1-2">No Ktp :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtupktp', '', ['id'=>'txtupktp','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Role :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtuprole', '', ['id'=>'txtuprole','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Status :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{ Form::select('txtupstatus', $getstatus, null, ['id'=>'txtupstatus', 'class'=>'validate browser-default']) }}
                  </div>
              </div>
            </div> 

        <div class="modal-footer">
            <!-- <i class="material-icons" id="help">help</i> -->
            {{ Form::submit('Submit',['name'=>'btnupbarang','id'=>'btnupbarang','class'=>'btn waves-light btn-medium red']) }}            </div>
        </div>

      </div>
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection

  <script>
  function updatedata(username,email,password,nama,alamat,telepon,handphone,noktp,role,status){
    $('#txtupusername').val(username);
    $('#txtupemail').val(email);
    $('#txtuppassword').val(password);
    $('#txtupnama').val(nama);
    $('#txtupalamat').val(alamat);
    $('#txtuptelepon').val(telepon);
    $('#txtuphandphone').val(handphone);
    $('#txtupktp').val(noktp);
    $('#txtuprole').val(role);
    $('#txtupstatus').val(status);
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>