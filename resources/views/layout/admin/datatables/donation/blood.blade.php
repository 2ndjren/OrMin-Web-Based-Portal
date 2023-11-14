
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<table id="blood-table" class="p-10">
  <thead class="">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Amount</th>
    </tr>
  </thead>
    <tbody></tbody>
  </table>
  <script>
    $(document).ready(function () {
      $('#blood-table').DataTable({
        ajax: {
            "url": "{{url('validated-donation')}}", // Replace with your server-side data source URL
            "type": "GET",
            "dataSrc":"donors"
        },
        'columns': [
                    {'data': 'id'},
                    {
                      "data": null, // This column doesn't have a direct data source
                "render": function(data, type, row) {
                  var fullName = row.fname + ' ' + row.lname;
                    return fullName;
                }
                    },
                    {'data': 'donated_amount'},
                    {
                          "data": null,
                    "render": function(data, type, row) {
                        return '<button class="bg-green-500 text"  data-id="' + row.id + '">Check</button>';
                    }
                    },
                ],
        "searching": true // Enable search feature
    });
      
    });
  </script>