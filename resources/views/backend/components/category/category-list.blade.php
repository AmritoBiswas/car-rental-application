<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Manage Rent</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                {{-- @foreach ($cars as $car ) --}}
                    
                <thead>
                    <tr class="bg-light">
                        <th>ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Car Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody id="tableList">
                    
                </tbody>
                {{-- @endforeach --}}
            </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    getList();
    async function getList(){
        // showLoader();
        let res = await axios.get('/editRentStatus');
        hideLoader();

        let result = res.data['data'];


        let tableData = $('#tableData');
        let tableList = $("#tableList");

        tableData.DataTable().destroy();
        tableList.empty();

        result.forEach(function(item,index){
            let row =`
                <tr>
                    <td>${index + 1}</td>
                    <td>${item['user']['name']}</td>
                    <td>${item['user']['email']}</td>
                    <td>${item['car']['name']}</td>
                    <td>${item['start_date']}</td>
                    <td>${item['end_date']}</td>
                    <td>${item['total_cost']}</td>
                    <td>${item['status']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm-button btn-outline-success" >Change Status</button>
                        
                    </td>
                </tr>
            `
            tableList.append(row);
        }
    )
            new DataTable( '#tableData', {
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        } );


        $('.editBtn').on('click',async function(){
            let id = $(this).data('id');
            await FillUpdateForm(id);
            $('#update-modal').modal('show');
            
        })

        $('.deleteBtn').on('click',function(){
            let id = $(this).data('id');
            $('#delete-modal').modal('show');
            $("#deleteID").val(id);
            
        })


    }

</script>

