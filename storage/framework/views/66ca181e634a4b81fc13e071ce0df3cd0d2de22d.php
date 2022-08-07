<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18"><?php echo e(__('Dashboard')); ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to <?php echo e(config('app.name')); ?> Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary"><?php echo e(__('Welcome Back!')); ?></h5>
                            <p><?php echo e(config('app.name')); ?> <?php echo e(_('Dashboard')); ?></p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="<?php echo e(URL::asset('assets/images/profile-img.png')); ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="<?php if($user->profile_photo != ''): ?><?php echo e(URL::asset('storage/images/users/' . $user->profile_photo)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/noImage.png')); ?><?php endif; ?>" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h5>
                        <p class="text-muted mb-0 text-truncate"><?php echo e($doctor_info->title); ?></p>
                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-size-12"><?php echo e(__('Last Login:')); ?></h5>
                                    <p class="text-muted mb-0"> <?php echo e($user->last_login); ?> </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a href="<?php echo e(url('profile-edit')); ?>"
                                        class="btn btn-primary waves-effect waves-light btn-sm"><?php echo e(__('Edit Profile')); ?>

                                        <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    <a href="<?php echo e(url('time-edit/' . $user->id)); ?>"
                                        class="btn btn-primary waves-effect waves-light btn-sm"><?php echo e(__('Edit Time Slot')); ?>

                                        <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__('Monthly Earning')); ?></h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-muted"><?php echo e(__('This month')); ?></p>
                        <h3>$<?php echo e(number_format($data['monthly_earning'])); ?></h3>
                        <p class="text-muted"><span class="<?php if($data['monthly_diff'] > 0): ?> text-success <?php else: ?> text-danger <?php endif; ?> mr-2"> <?php echo e($data['monthly_diff']); ?>% <i class="mdi <?php if($data['monthly_diff'] > 0): ?> mdi-arrow-up <?php else: ?> mdi-arrow-down <?php endif; ?>"></i> </span>
                            <?php echo e(__('From previous month')); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <div id="radialBar-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <?php if(session()->has('page_limit')): ?>
                            <?php
                                $per_page = session()->get('page_limit');
                            ?>
                        <?php else: ?>
                            <?php
                                $per_page = Config::get('app.page_limit');
                            ?>
                        <?php endif; ?>
                        <div class="media-body">
                            <p class="text-muted font-weight-medium"><?php echo e(__('Display items per page')); ?></p>
                            <button
                                class="btn  <?php echo e($per_page == 10 ? 'btn-primary' : 'btn-info'); ?>  btn-sm mr-2 per-page-items  mb-md-1"
                                data-page="10">10</button>
                            <button
                                class="btn  <?php echo e($per_page == 25 ? 'btn-primary' : 'btn-info'); ?>  btn-sm mr-2 per-page-items  mb-md-1"
                                data-page="25">25</button>
                            <button
                                class="btn  <?php echo e($per_page == 50 ? 'btn-primary' : 'btn-info'); ?>  btn-sm mr-2 per-page-items  mb-md-1"
                                data-page="50">50</button>
                            <button
                                class="btn  <?php echo e($per_page == 100 ? 'btn-primary' : 'btn-info'); ?>  btn-sm mr-2 per-page-items  mb-md-1"
                                data-page="100">100</button>
                        </div>
                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-book-open font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Appointments')); ?></p>
                                <h4 class="mb-0"><?php echo e(number_format($data['total_appointment'])); ?></h4>
                            </div>
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bxs-calendar-check font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Revenue')); ?></p>
                                <h4 class="mb-0">$<?php echo e(number_format($data['revenue'], 2)); ?></h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-dollar font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__("Today's Earning")); ?></p>
                                <h4 class="mb-0">$<?php echo e(number_format($data['daily_earning'], 2)); ?></h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-dollar-circle  font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Today Appointments')); ?></p>
                                <a href="<?php echo e(url('today-appointment')); ?>"
                                    class="mb-0 font-weight-medium font-size-20">
                                    <h4 class="mb-0"><?php echo e(number_format($data['today_appointment'])); ?></h4>
                                </a>
                            </div>
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-calendar font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Tomorrow Appointments')); ?></p>
                                <h4 class="mb-0"><?php echo e(number_format($data['tomorrow_appointment'])); ?></h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-calendar-event font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Upcoming Appointments')); ?></p>
                                <a href="<?php echo e(url('upcoming-appointment')); ?>"
                                    class="mb-0 font-weight-medium font-size-20">
                                    <h4 class="mb-0"><?php echo e(number_format($data['Upcoming_appointment'])); ?>

                                    </h4>
                                </a>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class='bx bxs-calendar-minus font-size-24'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__('Monthly Appointments')); ?></h4>
                <div id="monthly_appointment" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__("Today's Appointments")); ?></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th><?php echo e(__('Sr.No.')); ?></th>
                                <th><?php echo e(__('Patient Name')); ?></th>
                                <th><?php echo e(__('Patient Contact No')); ?></th>
                                <th><?php echo e(__('Patient Email')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Time')); ?></th>
                                <th><?php echo e(__('Options')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($item->patient->first_name); ?> <?php echo e($item->patient->last_name); ?></td>
                                    <td><?php echo e($item->patient->mobile); ?></td>
                                    <td><?php echo e($item->patient->email); ?></td>
                                    <td><?php echo e($item->appointment_date); ?></td>
                                    <td><?php echo e($item->timeSlot->from . ' to ' . $item->timeSlot->to); ?></td>
                                    <td>
                                        <a href="tel:<?php echo e($item->patient->mobile); ?>">
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                <?php echo e(__('Call')); ?>

                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php /**PATH C:\xampp\htdocs\Admin\resources\views/layouts/doctor-dashboard.blade.php ENDPATH**/ ?>