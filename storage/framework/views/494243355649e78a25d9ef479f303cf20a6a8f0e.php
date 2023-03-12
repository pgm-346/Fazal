<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div> -->
  
                <!-- <div class="card-body"> -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                <!-- </div> -->
            <!-- </div>
        </div> -->
    </div>
</div>


                <div class="card">
                  <div class="card-header" >
                    <button class="btn btn-success" id="card-header">Add Students</button>
                    <button class="btn btn-success" id="card-header-2">Add Teacher</button>
                    <button class="btn btn-success" id="card-header-3">Add Student Marks</button>
                </div>
                
                  <div class="card-body" id="card-body">
  
                      <form action="<?php echo e(route('add.student')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  <?php if($errors->has('name')): ?>
                                      <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                  <?php endif; ?>
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Age</label>
                            <div class="col-md-6">
                                <input type="number" id="age" class="form-control" name="age" required autofocus>
                                <?php if($errors->has('age')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('age')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                                <input type="radio" name="gender" value="male"> Male 
                                <input type="radio" name="gender" value="female"> Female 
                                <input type="radio" name="gender" value="other"> Other
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Reporting Teacher</label>
                           
                            <select name="teacher_id" id="teacher_id">
                            <option></option>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  class="form-control" value="<?php echo e($teacher->id); ?>" name="teacher"><?php echo e($teacher->teacher_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                      </form>
                  </div>

                  



                  
                 
                  <div class="card-body" id="card-body-3">
  
                      <form action="<?php echo e(route('add.student_mark')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Student Name</label>
                           
                            <select name="st_name" id="st_name">
                                <option>Select Name</option>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($student->id); ?>" ><?php echo e($student->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="term" class="col-md-4 col-form-label text-md-right">Term</label>
                            
                            <select name="term" id="term">
                                <option>Select Term</option>
                                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($term->id); ?>"><?php echo e($term->term); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Subject</label>
                            <div class="col-md-12">

                            <div class="col-sm-4 marg"><label>Maths</label>
                                <input type="number" id="maths" class="form-control" name="maths" required autofocus>
                            </div>
                            <div class="col-sm-4 marg"><label>Science</label>
                                <input type="number" id="science" class="form-control" name="science" required autofocus>
                            </div>
                            <div class="col-sm-4 marg"><label>History</label>
                                <input type="number" id="history" class="form-control" name="history" required autofocus>
                            </div>
                               
                            </div>
                        </div>
                        
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                      </form>
                  </div>



              </div>

<br>   

             
               
                

            










<link rel="stylesheet" href="/assets/css/custom.css" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/login/resources/views//edit.blade.php ENDPATH**/ ?>