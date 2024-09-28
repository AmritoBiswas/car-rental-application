<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <select name="status" id="status">
                                    <option value="Completed">Completed</option>
                                    <option value="Canceled">Canceled</option>
                                </select>
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>

    async function FillUpdateForm(id){
        document.getElementById('updateID').value = id;

        // showLoader();
        console.log(id)

       
        hideLoader();
   
    }

    async function Update(){
       let status = document.getElementById('status').value;
       let id = document.getElementById('updateID').value;

       document.getElementById('update-modal-close').click();
       showLoader();

       let res = await axios.put(`/updateRentStatus/${id}`,{
                status:status
            })

     let result = res.data['data']

        hideLoader();

        if(result = 'updated'){
                successToast("Category Update Successfull");
                document.getElementById('update-form').reset();
                await getList();
            }

            else{
                errorToas("Something went wrong!");
            }
    }

</script>
