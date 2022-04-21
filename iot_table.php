<?php
    require_once('../db.php');

    $sql = "SELECT * FROM pc_inventory.iot_regis;";
    $result = $conn->query($sql);

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
<!-- bootstrap-table css & js -->








<table id="table" data-toggle="table" data-search="true" data-show-columns="true">
    <thead>
        <tr>
            <th data-sortable="true">ID</th>
            <th data-sortable="true">RB_name</th>
            <th data-sortable="true">OS</th>
            <th data-sortable="true">Version</th>
            <th data-sortable="true">Status</th>
            <th data-sortable="true">Last Check</th>
        </tr>
    </thead>
    <tbody>
        <?php
                foreach($result as $rows){
                    echo '  <tr>     
                            <td>'.$rows['id'].'</td>
                            <td>'.$rows['rb_name'].'</td>
                            <td>'.$rows['os'].'</td>
                            <td>'.$rows['version'].'</td>
                            <td>'.$rows['status'].'</td>
                            <td>'.$rows['last_check'].'</td>
                            </tr>
                        ';
                }
            ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
