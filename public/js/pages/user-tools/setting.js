var base_url = $('input[name="base_url"]').val();


// var userList = $('#tableUser').DataTable({
//   "fnRowCallback" : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
//     var index = iDisplayIndex + 1;
//     $('td:eq(0)', nRow).html(index);
//     return nRow;
//   },
//   "processing": true,
//   "serverSide": true,
//   "responsive": true,
//   order     : [[0, 'desc']],
//   ajax      : {
//     url : base_url + 'api/v1/users/list',
//   },
//   type : 'get',
//   columns : [
//     {
//       data      : 'id',
//       // name      : 'id',
//       // class     : 'text-center',
//       // orderable : false,
//       // searchable:  false
//     }, {
//       data      : 'noinduk',
//     //   name      : 'noinduk',
//     //   class     : 'text-center',
//     //   orderable : false,
//     //   searchable: false
//     }, {
//       data      : 'nama',
//     //   name      : 'nama',
//     //   class     : 'text-center',
//     //   orderable : true,
//     //   // searchable: true
//     }, {
//       data      : 'email',
//     //   name      : 'email',
//     //   class     : 'text-center',
//     }, {
//       data      : 'notelp',
//     //   name      : 'notelp',
//     //   class     : 'text-center',
//     }, {
//       data      : 'description',
//     //   name      : 'description',
//     //   class     : 'text-center',
//     }, {
//     //   data      : 'roles_id',
//     //   name      : 'user_roles.name',
//     //   class     : 'text-center',
//     }, {
//       data      : 'is_active',
//     //   name      : 'is_active',
//     //   class     : 'text-center',
//     }, {
//       data      : 'id',
//     //   name      : 'id',
//     //   sortable  : false,
//     //   searchable: false,
//     //   class     : 'text-center',
//       "render"  : function(data, type, row, meta){
//           return '<button class="btn btn-warning" style="color: white;" onclick="editRoomMotor('+data+')" data-toggle="modal" title="Edit Room Motor" data-target="#modal_list_motor"><i class="fa fa-pencil"></i>';
//       }
//     }
//   ],
//   global    : true
// });
// $(document).ready(function() {
  
// })

var userList = $('#tableUser').DataTable({
  "fnRowCallback" : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
    var index = iDisplayIndex + 1;
    $('td:eq(0)', nRow).html(index);
    return nRow;
  },
  processing: true,
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
      // name      : 'id',
      // class     : 'text-center',
      // orderable : false,
      // searchable:  false
    }, {
      targets : 1,
      data      : 'noinduk',
      // name      : 'noinduk',
      // class     : 'text-center',
      // orderable : false,
      // searchable: false
    }, {
      targets : 2,
      data      : 'nama',
      // name      : 'nama',
      // class     : 'text-center',
      // orderable : true,
      // searchable: true
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
      data      : 'roles_id',
      name      : 'user_roles.name',
      class     : 'text-center',
    }, {
      targets : 7,
      data      : 'is_active',
      name      : 'is_active',
      class     : 'text-center',
    }, {
      targets : 8,
      data      : 'id',
      name      : 'id',
      sortable  : false,
      searchable: false,
      class     : 'text-center',
      "render"  : function(data, type, row, meta){
          return '<button class="btn btn-warning" style="color: white;" onclick="editUser('+row.id+')" data-toggle="modal" title="Edit User" data-target="#modal_User"><i class="fa fa-pencil"></i>' + 
          '<button class="btn btn-danger" style="color: white;" onclick="removeUser('+row.id+')"><i class="fa fa-trash"></i>';
      }
    }
  ]
});
