<!-- resources/views/notes/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">
    <h2>Edit Note</h2>

    <!-- Edit Form -->
    <form action="<?php echo e(route('notes.update', $note->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Method Spoofing for PUT request -->

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $note->title)); ?>">
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?php echo e(old('description', $note->description)); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Note</button>
        <a href="<?php echo e(route('index')); ?>" class="btn btn-secondary mt-3 ml-2">Back</a>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (optional but needed for some components) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php /**PATH D:\laravel projects\keep notes\keep_notes\resources\views/edit.blade.php ENDPATH**/ ?>