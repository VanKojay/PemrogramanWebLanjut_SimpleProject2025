<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="text-primary mb-0">Daftar User</h2>
  <a href="pages/user_form.php" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah User
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table id="userTable" class="table table-striped table-bordered align-middle">
       <thead class="table-light">
        <tr>
            <th style="width: 50px;">No</th>
            <th>Username</th>
            <th>Role</th>
            <th>Alamat</th>
            <th>Kota</th>
        </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

<!-- DataTables & Export Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
  $(document).ready(function () {
    const table = $('#userTable').DataTable({
      ajax: {
        url: `${BASE_API_URL}/user.php?action=read`,
        dataSrc: 'data'
      },
      columns: [
        { data: null, render: (data, type, row, meta) => meta.row + 1 }, // No
        { data: 'Username' },
        { data: 'Role' },
        { data: 'Alamat' },
        { data: 'Kota' }
        ],
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-light' },
        { extend: 'csv', className: 'btn btn-sm btn-light' },
        { extend: 'excel', className: 'btn btn-sm btn-light' },
        { extend: 'pdf', className: 'btn btn-sm btn-light' },
        { extend: 'print', className: 'btn btn-sm btn-light' }
      ],
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        paginate: {
          next: "›",
          previous: "‹"
        }
      }
    });

    // Event: Klik baris untuk redirect ke detail
    $('#userTable tbody').on('click', 'tr', function () {
      const rowData = table.row(this).data();
      if (rowData && rowData.Id_User) {
        window.location.href = 'user_detail.php?id=' + rowData.Id_User;
      }
    });
  });
</script>

<style>
  .dt-button.btn-light:hover {
    background-color: #f8f9fa;
    border-color: #ced4da;
    color: #000;
  }
</style>
