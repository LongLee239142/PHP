<html>

<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #active {
            background: gray;
            color: white;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <th>Customer_id</th>
            <th>Frist Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Order Date</th>
            <th>Total Amount</th>

        </tr>
        </tr>
        <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        include("connect_database-1.php");

        $total_pages_sql = "SELECT COUNT(*) FROM customers";
        $result = mysqli_query($comn, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $start_loop = $offset/5;

        $sql = "SELECT c.customer_id, c.first_name, c.last_name, c.email, c.phone_number, c.address, c.city, c.country, o.order_date, o.total_amount
         FROM customers c
         JOIN orders o ON c.customer_id = o.customer_id 
         LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($comn, $sql);
        $sn = 1;
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
            $sn = $sn + $offset;
        }
        while ($data = mysqli_fetch_array($res_data)) {
            // $sn = 1;
        ?>
            <tr>
                <td><?php echo $sn; ?> </td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?> </td>
                <td><?php echo $data['phone_number']; ?> </td>
                <td><?php echo $data['address']; ?> </td>
                <td><?php echo $data['city']; ?> </td>
                <td><?php echo $data['country']; ?> </td>
                <td><?php
                    $datatime = new DateTime($data['order_date']);
                    echo  $datatime->format('d-m-Y H:i:s'); ?> </td>
                <td><?php echo $data['total_amount']; ?> </td>
                <td>
            </tr>
        <?php $sn++;
        } ?>
        <?php
        mysqli_close($comn);

        ?>
    </table>
    
        <ul class="pagination">
            <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                        } ?>">
                <a href="<?php if ($pageno <= 1) {
                                echo '';
                            } else {
                                echo "?pageno=" . ($pageno - 1);
                            } ?>">Prev</a>
        <?php for ($i = 1; $i <= $total_pages - 1; $i++) : ?>
            <?php if ($pageno == $i) {   ?>

                <li><a href="?pageno=<?php echo $i; ?>" id="active"><?php echo $i; ?></a></li>
            <?php
             }else { ?>
                <li><a href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        <?php endfor; ?>
        <?php if ($pageno == $total_pages) {   ?>
            <li><a href="?pageno=<?php echo $total_pages; ?>" id="active"><?php echo $total_pages ?></a></li>
        <?php } else { ?>
            <li><a href="?pageno=<?php echo $total_pages; ?>"><?php echo $total_pages ?></a></li>
        <?php } ?>
        <li><a href="<?php if ($pageno >= $total_pages) {
                            echo '';
                        } else {
                            echo "?pageno=" . ($pageno + 1);
                        } ?>">Late</a> </li>

        </ul>
</body>

</html>