<?php include("../../templates/header.php"); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12"></div>
        <div class="card">
            <div class="card-header text-center bg-info text-white">
                <h4>Descripcion</h4>
            </div>
            <div class="card-body">
                <form methond="post">
                    <div class="md-3">
                        <label><strong>Name:</strong></label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-1">
                        <label><strong>Description</strong></label>
                        <textarea id="SummernoteID" name="description" class="form-control"></textarea>
                    </div>
                     
                    <div class="d-flex justify-content-center">
                        <input type="submit" name="submit" value="Submit (save)" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

   
        
            
</div>           
<?php include("../../templates/footer.php"); ?>