<div class="row">
    <div class="col-xl-6 col-md-6">
        <div class="card" style="cursor: pointer" data-toggle="modal" data-target="#modalCardWorkLeavesReport">
            <div class="card-block">
                <div class="row align-items-center m-l-0">
                    <div class="col-auto">
                        <i class="icofont icofont-tree f-30 text-c-green"></i>
                    </div>
                    <div class="col-auto">
                        <h6 class="text-muted m-b-10">Work Leaves Report</h6>
                        <h2 class="m-b-0">{{ (@$workleaves_count) ? $workleaves_count : '0' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card" style="cursor: pointer" data-toggle="modal" data-target="#modalCardInternshipStatus">
            <div class="card-block">
                <div class="row align-items-center m-l-0">
                    <div class="col-auto">
                        <i class="icofont icofont-warning-alt f-30 text-c-yellow"></i>
                    </div>
                    <div class="col-auto">
                        <h6 class="text-muted m-b-10">Internship Status</h6>
                        <h2 class="m-b-0">{{ (@$internship_status) ? $internship_status : '0' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center m-l-0">
                    <div class="col-auto">
                        <i class="icofont icofont-users f-30 text-c-blue"></i>
                    </div>
                    <div class="col-auto">
                        <h6 class="text-muted m-b-10">Active Employees</h6>
                        <h2 class="m-b-0">{{ (@$active_employees) ? $active_employees : '0' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center m-l-0">
                    <div class="col-auto">
                        <i class="icofont icofont-users f-30 text-c-red"></i>
                    </div>
                    <div class="col-auto">
                        <h6 class="text-muted m-b-10">Inactive Employees</h6>
                        <h2 class="m-b-0">{{ (@$inactive_employees) ? $inactive_employees : '0' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Pop Up Form show work leaves report-->
    @include('livewire.home.modals.card-workleavesreport')

    <!--Modal Pop Up Form show internship status-->
    @include('livewire.home.modals.card-internshipstatus')

</div>
