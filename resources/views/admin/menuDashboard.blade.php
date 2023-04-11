<section class=" col-2 admin-dashboard-section py-5 bg-primary shadow-sm">
    
    <h3 class="text-light px-2 border-bottom mb-4">dashboard</h3>
        
    <div class="d-grid gap-2 ">
        <a href="{{ route('admin.users.index') }}" class="py-1 text-light border-bottom mx-3">Manage Users</a>
        <a href="" class="py-1 text-light border-bottom mx-3">Manage Sessions</a>
        <a href="{{ route('admin.exams.index') }}" class="py-1 text-light border-bottom mx-3">Manage Exams</a>
        <a href="" class="py-1 text-light border-bottom mx-3">Manage Vehicles</a>
    </div>
</section>