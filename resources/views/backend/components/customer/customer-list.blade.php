<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Customer</h4>
                </div>
                
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
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
        let res = await axios.get('/all-customer');
        // hideLoader();
       let result = (res.data['data'])
    

        let tableData = $('#tableData');
        let tableList = $("#tableList");

        tableData.DataTable().destroy();
        tableList.empty();

        result.forEach(function(customer,index){
            let row =`
                <tr>
                    <td>${index + 1}</td>
                    <td>${customer['name']}</td>
                    <td>${customer['email']}</td>
                    <td>${customer['phone_number']}</td>
                    <td>
                        <button data-id="${customer['id']}" class="btn editBtn btn-sm-button btn-outline-success" >Edit</button>
                        <button data-id="${customer['id']}" class="btn deleteBtn btn-sm-button btn-outline-danger" >Delete</button>
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
            $('#update-modal-customer').modal('show');
            
        })

        $('.deleteBtn').on('click',function(){
            let id = $(this).data('id');
            $('#delete-modal-customer').modal('show');
            $("#deleteIdCustomer").val(id);
            
        })


    }

</script>

