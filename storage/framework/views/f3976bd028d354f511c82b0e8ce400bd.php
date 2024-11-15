<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
     <!-- Display Success Message -->
     <?php if(session('success')): ?>
     <div class="alert alert-success">
         <?php echo e(session('success')); ?>

     </div>
    <?php endif; ?>
    <!-- Create Button aligned to the right -->
    <div class="d-flex justify-content-between mb-4">
        <h2>Notes</h2>
        <a href="<?php echo e(route('create.form')); ?>" class="btn btn-success">Create</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through your notes here -->
            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($note->title); ?></td>
                <td><?php echo e($note->description); ?></td>
                <td>
                    <!-- Edit Button -->
                    <a href="<?php echo e(route('notes.edit',$note->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Delete Button -->
                    <form action="<?php echo e(route('notes.destroy', $note->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?> <!-- CSRF Token -->
                        <?php echo method_field('DELETE'); ?> <!-- Spoofing DELETE HTTP method -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
                    </form>
                    
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH D:\laravel projects\keep notes\keep_notes\resources\views/index.blade.php ENDPATH**/ ?>