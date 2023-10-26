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
      <form action="" id="manage-mesure">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>



            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Objectif de sécurité/Mesure</label>
                <textarea name="OSM" id="" cols="30" rows="2" class="form-control"><?php echo isset($OSM) ? $OSM : '' ?></textarea>
              </div>
            </div>



          </div>
        </div>
      </form>
    </div>
    <div class="card-footer border-top border-info">
      <div class="d-flex w-100 justify-content-center align-items-center">
        <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-mesure">Save</button>
        <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=mesure_list">Cancel</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#manage-mesure').submit(function(e) {
    e.preventDefault()
    start_load()
    $.ajax({
      url: 'ajax.php?action=save_mesure',
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
            location.href = 'index.php?page=mesure_list'
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