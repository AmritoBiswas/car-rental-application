<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Car</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
{{--  --}}

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="name">

                                <label class="form-label mt-2">Brand</label>
                                <input type="text" class="form-control" id="brand">

                                <label class="form-label mt-2">Model</label>
                                <input type="text" class="form-control" id="model">

                                <label class="form-label mt-2">Year</label>
                                <input type="text" class="form-control" id="year">

                                <label class="form-label mt-2">Car Type</label>
                                <input type="text" class="form-control" id="car_type">

                                <label class="form-label mt-2">Daily Rent Price</label>
                                <input type="text" class="form-control" id="rent">

                               

                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('backend/images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label">Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="img">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary mx-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="saveCar()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
  async function saveCar(){
    let name=document.getElementById('name').value;
        let brand = document.getElementById('brand').value;
        let model = document.getElementById('model').value;
        let year = document.getElementById('year').value;
        let car_type = document.getElementById('car_type').value;
        let rent = document.getElementById('rent').value;
        let car_img = document.getElementById('img').files[0];

        if (name.length === 0) {
            errorToast("name Required !")
        }
        else if(brand.length===0){
            errorToast("brand Required !")
        }
        else if(model.length===0){
            errorToast("model Required !")
        }
        else if(year.length===0){
            errorToast("year Required !")
        }
        else if(car_type.length===0){
            errorToast("Car Type Required !")
        }
        else if(rent.length===0){
            errorToast("Rent Required !")
        }
        else if(!car_img){
            errorToast("Car Image Required !")
        }
        else{
            document.getElementById('modal-close').click();

            let formData = new FormData();
            formData.append('img',car_img)
            formData.append('name',name)
            formData.append('brand',brand)
            formData.append('model',model)
            formData.append('year',year)
            formData.append('car_type',car_type)
            formData.append('daily_rent_price',rent)
           
            const config = {
                headers:{
                    'content-type':'multipart/form-data'
                }
            }

            // showLoader();
            let res = await axios.post("/create-car",formData,config)
            hideLoader();

            console.log(res)
          

            if(res.status===200){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }



        }
   }


</script>
