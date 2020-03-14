var base_url = $('input[name="base_url"]').val();

var userList = $('#tableUser').DataTable({
  "fnRowCallback" : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
    var index = iDisplayIndex + 1;
    $('td:eq(0)', nRow).html(index);
    return nRow;
  },
  processing: false,
  serverSide: true,
  responsive: true,
  order     : [[0, 'desc']],
  ajax : {
    url : base_url + "/api/v1/users/list"
  },
  columnDefs : [
    {
      targets   : [0],
      data      : 'id',
      name      : 'id',
      class     : 'text-center',
      orderable : false,
      searchable:  false
    }, {
      targets : 1,
      data      : 'noinduk',
      name      : 'noinduk',
      class     : 'text-center',
      orderable : false,
      searchable: false
    }, {
      targets : 2,
      data      : 'nama',
      name      : 'nama',
      class     : 'text-center',
      orderable : true,
      searchable: true
    }, {
      targets : 3,
      data      : 'email',
      name      : 'email',
      class     : 'text-center',
    }, {
      targets : 4,
      data      : 'notelp',
      name      : 'notelp',
      class     : 'text-center',
    }, {
      targets : 5,
      data      : 'description',
      name      : 'description',
      class     : 'text-center',
    }, {
      targets : 6,
      data      : 'roles',
      name      : 'user_roles.roles',
      class     : 'text-center',
      render : function (data, type, row) {
        return '<span class="badge badge-pill badge-success">'+data+'<span>';
      }
    }, {
      targets : 7,
      data      : 'is_active',
      name      : 'is_active',
      class     : 'text-center',
      render : function (data, type, row) {
        let html = '';
        if (data == 1) {
          return html += '<span class="badge badge-pill badge-success">Active</span>';
        } else {
          return html += '<span class="badge badge-pill badge-danger">Deactive</span>';
        }
      }
    }, {
      targets : 8,
      data      : 'id',
      name      : 'id',
      sortable  : false,
      searchable: false,
      width : '20px',
      class     : 'text-center',
      "render"  : function(data, type, row, meta){
          return '<button class="btn btn-outline-warning btn-sm m-2" onclick="editUser('+row.id+')" data-toggle="modal" title="Edit User" data-target="#modal_User"><i class="fa fa-pencil"></i>' +
          '<button class="btn btn-outline-danger btn-sm " onclick="removeUser('+row.id+')"><i class="fa fa-trash"></i>';
      }
    }
  ]
});

function removeUser(id) {
  Swal.fire({
    title             : "Apakah anda yakin?",
    text              : "Anda tidak akan dapat mengulangi tindakan ini! (Delete Banner)",
    type              : "warning",
    showCancelButton  : true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText : 'Yes, I am sure!',
    cancelButtonText  : "No, cancel it!",
  }),
  function (result) {
    $.ajax({
      headers : {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      
    })
  }
}
