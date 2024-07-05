$(document).ready(function () {
    
    let table = $('#itemsTable').DataTable({
        ajax: {
            url: 'articles.php',
            dataSrc: '',
            data: function (d) {
                d.search = $('#search').val();
            }
        },
        columns: [
            { data: 'id' },
            { data: 'title' },
            { data: 'description' },
            { data: 'category' },
            { data: 'slug' },
            { data: 'created_at' },
            {
                data: null,
                render: function (row) {
                    return `
                        <button class="btn btn-info edit-btn" data-id="${row.id}">Edit</button>
                        <button class="btn btn-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                }
            }
        ]
    });

    $('#itemForm').on('submit', function (event) {
        event.preventDefault();
        let id = $('#itemId').val();
        let title = $('#title').val();
        let description = $('#description').val();
        let category = $('#category').val();
        let slug = $('#slug').val();

        $.ajax({
            url: 'articles.php',
            type: 'POST',
            data: {
                id: id,
                title: title,
                description: description,
                category: category,
                slug: slug
            },
            success: function (response) {
                table.ajax.reload();
                $('#itemForm')[0].reset();
                $('#itemId').val('');
                console.log(response);
            },
            error: function (error) {
                console.error("Error saving data:", error);
            }
        });
    });

    $(document).on('click', '.edit-btn', function () {
        let rowId = $(this).data('id');
        $.ajax({
            url: 'articles.php',
            type: 'GET',
            data: { id: rowId },
            success: function (data) {
                let item = JSON.parse(data);
                $('#itemId').val(item.id);
                $('#title').val(item.title);
                $('#description').val(item.description);
                $('#category').val(item.category);
                $('#slug').val(item.slug);
            }
        });
    });

    $(document).on('click', '.delete-btn', function () {
        let id = $(this).data('id');
        $.ajax({
            url: 'articles.php',
            type: 'DELETE',
            data: { id: id },
            success: function (response) {
                table.ajax.reload();
                console.log(response);
            },
            error: function (error) {
                console.error("Error deleting data:", error);
            }
        });
    });

    $('#search').on('keyup', function () {
        table.ajax.reload();
    });
});
