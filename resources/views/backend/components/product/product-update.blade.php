<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="carName">

                                <label class="form-label mt-2">Brand</label>
                                <input type="text" class="form-control" id="brandName">

                                <label class="form-label mt-2">Model</label>
                                <input type="text" class="form-control" id="modelName">

                                <label class="form-label mt-2">Year</label>
                                <input type="text" class="form-control" id="year">

                                <label class="form-label mt-2">Type of Car</label>
                                <input type="text" class="form-control" id="car_type">
                                <label class="form-label mt-2">Daily Rent</label>
                                <input type="text" class="form-control" id="rent">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('backend/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="productImgUpdate">

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">


                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>


<script>





    async function FillUpUpdateForm(id,path){
        
        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=path;
        document.getElementById('oldImg').src=path;


        // showLoader();
   

        let res=await axios.post("/car-by-id",{id:id})
        hideLoader();
        result = res.data['data']
        

        document.getElementById('carName').value=result['name'];
        document.getElementById('brandName').value=result['brand'];
        document.getElementById('modelName').value=result['model'];
        document.getElementById('year').value=result['year'];
        document.getElementById('car_type').value=result['car_type'];
        document.getElementById('rent').value=result['daily_rent_price'];

    }



    async function update() {

     
        let name = document.getElementById('carName').value;
        let brand = document.getElementById('brandName').value;
        let model = document.getElementById('modelName').value;
        let year = document.getElementById('year').value;
        let car_type = document.getElementById('car_type').value;
        let rent = document.getElementById('rent').value;

        let updateID=document.getElementById('updateID').value;
        let filePath=document.getElementById('filePath').value;
        let productImgUpdate = document.getElementById('productImgUpdate').files[0];


        if (name.length === 0) {
            errorToast("Name Required !")
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
            errorToast("car_type Required !")
        }
        else if(rent.length===0){
            errorToast("rent Required !")
        }

        else {

            document.getElementById('update-modal-close').click();

            let formData=new FormData();
            formData.append('name',name)
            formData.append('brand',brand)
            formData.append('model',model)
            formData.append('year',year)
            formData.append('car_type',car_type)
            formData.append('daily_rent_price',rent)
            formData.append('image_url',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/update-car",formData,config)
            hideLoader();

            for (var pair of formData.entries()) {
  console.log(pair[0] + " - " + pair[1]);
}

            if(res.status===200 && res.data['data']==='success'){
                successToast('Request completed');
                document.getElementById("update-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
