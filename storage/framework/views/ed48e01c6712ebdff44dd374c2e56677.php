<!-- resources/views/films/index.blade.php -->



<?php $__env->startSection('title', 'Films'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Films</h1>

    <div class="film-list">
        <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="film-card">
                <img src="<?php echo e(Storage::url($film->poster)); ?>" alt="<?php echo e($film->title); ?>" class="film-poster">
                <div class="film-info">
                    <h3 class="film-title"><?php echo e($film->title); ?></h3>
                    <p class="film-status">Status: <?php echo e(ucfirst($film->status)); ?></p>
                    <a href="<?php echo e($film->link); ?>" target="_blank" class="film-link">Watch Now</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <style>
        .film-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        .film-card {
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .film-poster {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .film-info {
            padding: 10px;
        }

        .film-title {
            font-size: 1.2em;
            font-weight: bold;
            margin: 10px 0;
        }

        .film-status {
            font-size: 0.9em;
            color: #777;
        }

        .film-link {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .film-link:hover {
            background-color: #0056b3;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/films/index.blade.php ENDPATH**/ ?>