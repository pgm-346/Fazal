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
                <h3 align="center">NEW Bank</h3>
                  <div class="card-header">
                    <button class="btn btn-success" id="card-header-1">Home</button>
                    <button class="btn btn-success" id="card-header-2">Deposite</button>
                    <button class="btn btn-success" id="card-header">Withdrawel</button>
                    <!-- <button class="btn btn-success" id="card-header-3">Satetment</button> -->
                    <a href="<?php echo e(route('statement_list')); ?>" class="btn btn-success">Satetment</a>
                </div>
                

                <div class="card-body" id="card-body-1">
                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Your ID</label>
                        <div class="col-md-6">
                            <div class="form-control"><?php echo e(Auth::user()->name); ?></div>
                            </div>
                    </div>
                    <div class="form-group row mar-50 ">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right ">Account Balance</label>
                        <div class="col-md-6 ">
                        <div class="form-control"><?php echo e($acc_balance->account_balance ?? ''); ?></div>
                        </div>
                    </div>
                </div>


                <div class="card-body" id="card-body-2">
                    <form action="<?php echo e(route('add.deposite')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">Deposite Amount</label>
                            <div class="col-md-6">
                                <input type="number" id="credit" class="form-control" name="credit" required autofocus>
                                <?php if($errors->has('credit')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('credit')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="card-body" id="card-body">
                    <form action="<?php echo e(route('add.withdraw')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">Withdrawel Amount</label>
                            <div class="col-md-6">
                                <input type="number" id="debit" class="form-control" width="40%" name="debit" required autofocus>
                                <?php if($errors->has('credit')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('credit')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary bt-wdt">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body" id="card-body-3" >
                        <form action="<?php echo e(route('add.statement')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-2 pad-bot">
                                <label>Debit</label>
                                <input type="radio" id="html" name="mode" value="1">
                                <label>Credit</label>
                                <input type="radio" id="html" name="mode" value="0">
                            </div>
                            <div class="col-md-12 row pad-bot">
                                <br>  <br>
                                <h6>From</h6>
                                <div class="col-md-4">
                                    <input type="date" id="fromdate" class="form-control" name="fromdate" required autofocus>
                                    <?php if($errors->has('fromdate')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('fromdate')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <h6>To</h6>
                                <div class="col-md-4">
                                    <input type="date" id="enddate" class="form-control" name="enddate" required autofocus>
                                    <?php if($errors->has('enddate')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('enddate')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary bt-wdt" id="search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
    </div>
           

            
             
</div>      




 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/allianze/Documents/bank/resources/views/dashboard.blade.php ENDPATH**/ ?>