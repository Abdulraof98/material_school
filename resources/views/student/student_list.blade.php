<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="student-management"></x-navbars.sidebar>
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
                            <div class="table-responsive p-3">
                               
                                <table id="students-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Date of Join</th>
                                            <th>Actions</th>
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
        $('#students-table').DataTable({
            serverSide: true,
            ajax: '/students-data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name',  title: 'First Name' },
                { data: 'gender', name: 'gender' },
                { data: 'status', name: 'status' },
                { data: 'date_of_join', title: 'Date of Join' },
                { 
            data: null,
            title: 'Actions',
            render: function (data, type, row) {
                return '<a class="btn btn-primary edit-btn m-2" href="{{route(update-student,"'+ data.id+')}}"' + data.id + '">Edit</a>'+
                '<button class="btn btn-danger delete-btn m-2" data-id="' + data.id + '">Delete</button>';
            }
        },
        
            ],
            headerCallback: function(thead, data, start, end, display) {

            $('thead')
                .find('th:last-child') // Target the last column's header
                .removeClass('sorting') // Remove the sorting class
                // .find('.dataTables_filter') // Find the filter element
                // .remove(); // Remove the filter element
        }
        
        });
        $('thead', 'th:last-child').removeClass('sorting');
    });
    
</script>