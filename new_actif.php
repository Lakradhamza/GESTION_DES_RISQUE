<?php
include 'db_connect.php'; ?>
<style>
  textarea {
    resize: none;
  }
</style>
<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <form action="" id="manage-actif">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Type</label>
                <textarea name="type" id="" cols="30" rows="2" class="form-control"><?php echo isset($TYPE) ? $TYPE : '' ?></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Bien support</label>
                <textarea name="biensupport" id="" cols="30" rows="2" class="form-control"><?php echo isset($BIENSUPPORT) ? $BIENSUPPORT : '' ?></textarea>
              </div>
            </div>


            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">description</label>
                <textarea name="description" id="" cols="30" rows="3" class="form-control"><?php echo isset($DESCRIPTION) ? $DESCRIPTION : '' ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer border-top border-info">
      <div class="d-flex w-100 justify-content-center align-items-center">
        <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-actif">Save</button>
        <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=actif_list">Cancel</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#manage-actif').submit(function(e) {
    e.preventDefault()
    start_load()
    $.ajax({
      url: 'ajax.php?action=save_actif',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        if (resp == 1) {
          alert_toast('Data successfully saved', "success");
          setTimeout(function() {
            location.href = 'index.php?page=actif_list'
          }, 2000)
        }
      }
    })
  })

  function displayImgCover(input, _this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#cover').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>