@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 

  if(!isset($restore)){
    $restore = "AKTIF";
  }
?>

@section('content')
  
  {{ Form::open(array('url' => 'saveregisteruser')) }}
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Kategori Barang</h3>
            <!--<hr class='center' style='border: 1px solid white;margin-top:-3.7%'>-->
            <div class="row">
              <div class="row">
                  <div class="col m6">Username :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupusername', '', ['id'=>'txtupusername','','class'=>'validate','readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Email :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupemail', '', ['id'=>'txtupemail','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Password :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuppassword', '', ['id'=>'txtuppassword','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Nama :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupnama', '', ['id'=>'txtupnama','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Alamat :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupalamat', '', ['id'=>'txtupalamat','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Telepon :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuptelepon', '', ['id'=>'txtuptelepon','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Hp :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuphandphone', '', ['id'=>'txtuphandphone','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">No Ktp :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupktp', '', ['id'=>'txtupktp','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Role :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuprole', '', ['id'=>'txtuprole','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Status :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{ Form::select('txtupstatus', $getstatus, null, ['id'=>'txtupstatus', 'class'=>'validate browser-default']) }}
                  </div>
              </div>
            </div> 
            <div class="modal-footer">
                {{ Form::submit('UPDATE',['name'=>'btnEditcustomer','id'=>'btnEditcustomer','class'=>'btn waves-light btn-medium red']) }}
            </div>
        </div>
  <!-- tutup modal -->
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m1 l1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                <h4>Data Pegawai</a><hr></h4>
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newregisteruser'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Username/Password</th>
                    <th>Email / Nama</th>
                    <th>Alamat</th>
                    <th>Hp/Telp</th>
                    <th>No Ktp</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach($datauser as $row)
                  <tr>
                    <td>{{$row->username}}<br>{{$row->password}}</td>
                    <td>{{$row->email}}<br>{{$row->nama}}</td>
                    <td>{{$row->alamat}}</td>
                    <td>{{$row->handphone}}<br>{{'(024)'.$row->telepon}}</td>
                    <td>{{$row->noktp}}</td>
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
                    <td><a class="waves-effect waves-light btn modal-trigger red" onclick="updatedata('{!! $username !!}','{!! $email !!}','{!! $password !!}','{!! $nama !!}','{!! $alamat !!}','{!! $telepon !!}','{!! $handphone !!}','{!! $noktp !!}','{!! $role !!}','{!! $status !!}')" href="#modal_update">EDIT</a></td>
                  </tr>
                  @endforeach
                </table>
                <br>
                @if($restore == "TIDAK AKTIF")
                  <input  type='submit' class='waves-light btn-small right col m0.5 red' name='btncancels' id='btncancels' value='Cancel'>
                @endif
              </div>
              </div>
              {{ $datauser->links() }}
            </div>
          </div>
      </div>
    </div>
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
  <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="js/materialize.min.js"></script>

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  $('.dropdown-trigger').dropdown();
  
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
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>