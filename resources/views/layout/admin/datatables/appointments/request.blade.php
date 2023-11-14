<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<table id="appointment-pending-table" class="p-10">
  <thead class="">
    <tr>
      <th>Name</th>
      <th>Date</th>
      <th>Time</th>
      <th>Show Details</th>
    </tr>
  </thead>
    <tbody></tbody>
  </table>
  <script>
    $(document).ready(function () {
      $('#appointment-pending-table').DataTable()
    });
  </script>