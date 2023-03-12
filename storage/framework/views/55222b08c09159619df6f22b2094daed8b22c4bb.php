<?php $__env->startSection('content'); ?>



<div class="container">
            <div class="row justify-content-center pad-bot ">
                <div class="col-md-8">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert" align="center">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div> 

            <div class="card">
                  <div class="card-header">
                    <button class="btn btn-success" id="card-header-2">Add Project</button>
                    <button class="btn btn-success" id="card-header">Assign Projects</button>
                    <button class="btn btn-success" id="card-header-3">Display</button>
                </div>
                
                <div class="card-body" id="card-body">
                    <form action="<?php echo e(route('ass.project')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="Project name" class="col-md-4 col-form-label text-md-right">Project Name</label>
                            
                            <select name="project_id" id="project_id" class="mar-rgt" required autofocus>
                                <option value disabled selected>Select Project</option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  class="form-control" value="<?php echo e($project->id); ?>" name="project"><?php echo e($project->project_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('project_id')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('project_id')); ?></span>
                                <?php endif; ?>
                            </select>
                            <button class="btn btn-success" style="padding-right:10px;" id="card-header-4">Add Project</button>
                        </div>

                        <div class="form-group row">
                            <label for="start date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                            <div class="col-md-6">
                                <input type="date" id="st_date" class="form-control" name="st_date" required autofocus>
                                <?php if($errors->has('st_date')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('st_date')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start time" class="col-md-4 col-form-label text-md-right">Start Time</label>
                            <div class="col-md-6">
                                <input type="time" id="st_time" class="form-control" name="st_time" required autofocus>
                                <?php if($errors->has('st_time')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('st_time')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end date" class="col-md-4 col-form-label text-md-right">End Date</label>
                            <div class="col-md-6">
                                <input type="date" id="end_date" class="form-control" name="end_date" required autofocus>
                                <?php if($errors->has('end_date')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('end_date')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end time" class="col-md-4 col-form-label text-md-right">End Time</label>
                            <div class="col-md-6">
                                <input type="time" id="end_time" class="form-control" name="end_time" required autofocus>
                                <?php if($errors->has('end_time')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('end_time')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                         
                        
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                        </div>
                    </form>
                </div>

                <div class="card-body" id="card-body-2">
                    <form action="<?php echo e(route('add.project')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">Project Name</label>
                            <div class="col-md-6">
                                <input type="text" id="project_name" class="form-control" name="project_name" required autofocus>
                                <?php if($errors->has('project_name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('project_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                 
                
            

<br>   
      
        <div class="card-body" id="card-body-3">
            <table>
                <thead>
                    <tr>
                        <th colspan="8" class="ta"><h4>Project Details</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Days</th>
                        <th>Hour</th>
                        <th>Minutes</th>
                        <th>Action</th>
                        
                    </tr>
                </tbody>

                <?php if($ass_projects->count()): ?>
                    <?php $__currentLoopData = $ass_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ass_project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Note, this gives you a timestamp, i.e. seconds since the Epoch.
                        $start_date = strtotime($ass_project->st_date);
                        $end_date = strtotime($ass_project->end_date);

                        $dte_difference = $end_date - $start_date;
                        $time_diff =  date('G', strtotime($ass_project->end_time) - strtotime($ass_project->st_time));
                        $minute =  date('i', strtotime($ass_project->end_time) - strtotime($ass_project->st_time));

                       
                       
                        // $start_time =  $ass_project->st_time;
                        // $end_time =  $ass_project->end_time;

                         


                        ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($ass_project->project_name->project_name); ?></td>
                            <td><?php echo e(round($dte_difference / 86400)); ?></td>
                            <td><?php echo e($time_diff); ?></td>
                            <td><?php echo e($minute); ?></td>
                            <td> <a href="<?php echo e(route('project.delete',[$ass_project->id])); ?>" class="btn btn-danger">Delete</a></td>
                            
                             
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr><td colspan="8" ><h3>No Data Availble</h3></td></tr> 
                <?php endif; ?>
            
            </table>
        </div>
    </div>
            <br>

            
             
</div>      




 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/allianze/Documents/demo works/mini work time/work-time/resources/views/dashboard.blade.php ENDPATH**/ ?>