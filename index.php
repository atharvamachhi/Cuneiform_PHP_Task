<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuneiform-task</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Cuneiform-task</h2>
        <div id="alertContainer" class="mt-3 mb-3"></div>
        <form id="itemForm" style="width: 97%;">
            <input type="hidden" id="itemId">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" required>
                    <option value="">select</option>
                    <option value="Food">Food</option>
                    <option value="Education">Education</option>
                    <option value="Businessmen">Businessmen</option>
                    <option value="Positions">Positions</option>
                </select>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3" style="width:10%;">Save</button>
        </form>

        <table id="itemsTable" class="table table-bordered" style="padding-top:10px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="itemsTableBody">
                
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="jquery.js"></script>
    
</body>

</html> 
