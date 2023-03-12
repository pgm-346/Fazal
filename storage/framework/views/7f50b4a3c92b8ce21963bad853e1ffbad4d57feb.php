<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="/assets/css/custom.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                            <div class="col-sm-2">
                                <h4>Edit Student</h4>
                            </div>
                            <div class="col-sm-10" align="right">              
                                <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-success" id="card-header-2" align="right">Back</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body" id="card-body" style="display:block!important;">
                        <form action="<?php echo e(route('student.update',[$student->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" value="<?php echo e($student->name); ?>" class="form-control" name="name" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Age</label>
                                <div class="col-md-6">
                                    <input type="number" id="age"  value="<?php echo e($student->age); ?>"  class="form-control" name="age" required autofocus>
                                    <?php if($errors->has('age')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('age')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <input type="radio" name="gender" value="M" <?php echo e($student->gender == 'M' ? 'checked' : ''); ?> > Male 
                                    <input type="radio" name="gender" value="F" <?php echo e($student->gender == 'F' ? 'checked' : ''); ?> > Female 
                                    <input type="radio" name="gender" value="O" <?php echo e($student->gender == 'O' ? 'checked' : ''); ?> > Other
                                    <?php if($errors->has('gender')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('gender')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="place" class="col-md-4 col-form-label text-md-right">Reporting Teacher</label>
                            
                                <select name="teacher_id" id="teacher_id" required autofocus>
                                <option value disabled selected >Select Teacher</option>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($teacher->id); ?>" name="teacher"  <?php if($teacher->id == $student->teacher_id): ?> selected <?php endif; ?> ><?php echo e($teacher->teacher_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                            </div>
                        </form>
                    </div>
              </div>
            </div>    

             
       




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/login-mechine-test/resources/views/edit.blade.php ENDPATH**/ ?>