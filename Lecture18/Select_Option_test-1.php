

    <form method="post">
    <label for="category">Select Category:</label>
    <select name="category" id="category">
        <option value="">All Categories</option>
        <?php
        // // Connect to the database
        include("connect_database-3.php");


        // Get list data base
        $sql = "SELECT category_name , category_id FROM categories";
        $result = $comn->query($sql);

        // Display list
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Filter">
</form>
?>
<div>
    <script>
const combobox = document.getElementById('category-combobox');
const productsTable = document.getElementById('products-table');

combobox.addEventListener('change', () => {
  const categoryId = combobox.value;
  const sql = `SELECT * FROM products WHERE category_id = ${categoryId}`;
  fetchData(sql)
    .then(data => {
      const rows = [];
      data.forEach(product => {
        const row = `<tr>
                      <td>${product.product_id}</td>
                      <td>${product.product_name}</td>
                      <td>${product.description}</td>
                      <td>${product.price}</td>
                      <td>${product.stock_quantity}</td>
                    </tr>`;
        rows.push(row);
      });
      productsTable.innerHTML = rows.join('');
    });
});

function fetchData(sql) {
  return fetch('/api/products', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ sql })
  })
  .then(response => response.json())
  .then(data => data.data)
  .catch(error => console.error('Error:', error));
}
</script>
</div>