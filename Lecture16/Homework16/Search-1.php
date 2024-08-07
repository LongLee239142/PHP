<?php
include "connect_database-2.php";
if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT*FROM products WHERE name LIKE ? OR original_price LIKE ? OR category LIKE ? OR percent_discount LIKE ? ";
    $stmt = $comn->prepare($sql);
    $stmt->bind_param("ssss", $search, $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
?><table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>original_price</th>
            <th>category</th>
            <th>percent_discount </th>

        </tr>
        <?php
        if ($result->num_rows > 0) {

            $sn = 1;

            while ($data = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $sn; ?> </td>
                    <form method="post">
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['original_price']; ?></td>
                        <td><?php echo $data['category']; ?> </td>
                        <td><?php echo $data['percent_discount']; ?> </td>
                        <td>
                            <a href="Edit_Info-1.php?id=<?php echo $data['id']; ?>" value="">Edit Infor</a>
                            <a href="delete_product-1.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                        </td>
                </tr>
                </form>
    <?php }
        } else {
            echo "<script> alert('No results found for keywords!')</script>";
            echo "<script>location.href = 'Question-4.php'</script>";
        }
    }
    ?>
    </table>
    <a href="Question-4.php">Comeback</a>