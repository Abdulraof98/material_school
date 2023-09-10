<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                User</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="classes-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Teacher</th>
                                            <th>Class Name</th>
                                            <th>Total Seat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
<script>
    $(document).ready(function() {
        
    });
    $('#classes-table').DataTable({
    serverSide: true,
    ajax: '/classes-data',
    dom: '<f>t',
    columns: [
        { data: 'id', title: 'Id' },
        { data: 'teacher_name', title:'Teacher' },
        { data: 'class_name', title:'Class Name' },
        { data: 'total_seat', title: 'Total Seat' },
        { 
            data: null,
            title: 'Actions',
            render: function (data, type, row) {
                return '<button class="btn btn-primary edit-btn" data-id="' + data.id + '">Edit</button>';
            }
        }
    ]
});

</script>