<?php $__env->startSection('content'); ?>

        <div class="container">
            <div class="row justify-content-center pad-bot ">
                <div class="col-md-8">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert"  align="center">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header" >
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Edit Students Marks</h4>
                        </div>
                        <div class="col-sm-8" align="right">              
                            <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-success" id="card-header-2" align="right">Back</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body" id="card-body-3" style="display:block!important;">
                    <form action="<?php echo e(route('mark.update',[$mark->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Student Name</label>
                            
                            <select name="st_name" id="st_name" required>
                                <option value disabled selected >Select Name</option>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($student->id); ?>" <?php if($student->id == $mark->st_name): ?> selected <?php endif; ?> ><?php echo e($student->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="term" class="col-md-4 col-form-label text-md-right">Term</label>
                            
                            <select name="term" id="term" required autofocus>
                                <option value disabled selected >Select Term</option>
                                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($term->id); ?>" <?php if($term->id == $mark->term): ?> selected <?php endif; ?> ><?php echo e($term->term); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    
                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Subject</label>
                            <div class="row pad-lft">
                                <div class="mar-rgt">
                                    <label>Maths</label>
                                    <div>
                                        <input type="number" id="maths" value="<?php echo e($mark->maths); ?>" class="form-control" name="maths" required autofocus>
                                    </div>
                                </div>
                                <div class="mar-rgt">
                                    <label>Science</label>
                                    <div>
                                        <input type="number" id="science" value="<?php echo e($mark->science); ?>" class="form-control" name="science" required autofocus>
                                    </div>
                                </div>
                                <div>
                                    <label>History</label>
                                    <div>
                                        <input type="number" id="history" value="<?php echo e($mark->history); ?>" class="form-control" name="history" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                        </div>
                    </form>
                </div>
              </div>
            <br>   
        </div>              
  

<link rel="stylesheet" href="/assets/css/custom.css" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/login-mechine-test/resources/views/mark_edit.blade.php ENDPATH**/ ?>