<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>All Cars</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0  bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Car Type</th>
                    <th>Daily Rent</th>
                    <th>Availability</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    getList();
    async function getList(){
        // showLoader();
        let res = await axios.get('/all-car');
        
        // hideLoader();
        const result = res.data['data'];
        


        let tableList = $('#tableList');
        let tableData = $('#tableData');

        tableData.DataTable().destroy();
        tableList.empty();

        result.forEach(function(car,index){

            let avalability = ((car['availability'] == 1)? "Available" : " Not Available")
            let row =  `<tr>
                        <td><img class="w-75 h-15" src="${car['image_url']}"/></td>
                        <td>${car['name']}</td>
                        <td>${car['brand']}</td>
                        <td>${car['model']}</td>
                        <td>${car['year']}</td>
                        <td>${car['car_type']}</td>
                        <td>${car['daily_rent_price']}</td>
                        <td>${avalability}</td>
                        <td>
                            <button data-path="${car['image_url']}" data-id="${car['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-path="${car['image_url']}" data-id="${car['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                        </tr>`
           
        tableList.append(row);

        })

        new DataTable('#tableData',{
            order:[[0,'desc']],
            
        });


        $(".deleteBtn").on('click',function(){
            let id = $(this).data('id');
            
            let path = $(this).data('path');
            

            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
            $("#deleteFilePath").val(path);
        })

        $(".editBtn").on('click', async function(){
            let id = $(this).data('id');
            let path = $(this).data('path');
            await FillUpUpdateForm(id,path)
           $("#update-modal").modal('show');
         

        })

        
        
    }
</script>

