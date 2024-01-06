  <!-- Modal -->
  <div class="modal right fade" id="add_user" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
      <button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title text-center">Add Company</h4>
          <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form>
                <h4>Organization Name</h4>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label class="col-form-label">Organization Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Organization Name" name="organization">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Organization</label>
                    <select class="form-control">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                  </div>
                </div>
                <h4>Organization Contact Details</h4>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Fax</label>
                    <input type="text" class="form-control" name="fax" placeholder="Fax">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Website</label>
                    <input type="text" class="form-control" name="website" placeholder="Website">
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Linkedin</label>
                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Facebook</label>
                    <input type="text" class="form-control" name="fb" placeholder="Facebook">
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Twitter</label>
                    <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Email Domains</label>
                    <input type="text" class="form-control" name="domains" placeholder="Email Domains">
                  </div>

                </div>
                <h4>Address Information</h4>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Billing Address</label>
                    <textarea class="form-control" rows="3" name="billing-address" placeholder="Billing Address"></textarea>
                  </div>
                  <div class="col-sm-6 mt-3">
                    <label class="col-form-label"></label><br>
                    <input type="text" class="form-control" placeholder="Billing City" name="billing-city">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Billing State" name="billing-state">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Billing Postal code"
                      name="billing-postal-code">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Billing Country</label>
                    <select class="form-control">
                      <option>India</option>
                      <option>US</option>
                      <option>Japan</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Shipping Address</label>
                    <textarea class="form-control" rows="3" name="shipping-address" placeholder="Shipping Address"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Shipping City" name="shipping-city">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Shipping State" name="shipping-state">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Shipping Postal code"
                      name="shipping-postal-code">
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control">
                      <option>India</option>
                      <option>US</option>
                      <option>Japan</option>
                    </select>
                  </div>
                </div>
                <h4>Additional Information</h4>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Dates To Remember <span class="text-danger">*</span></label>
                    <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                        placeholder="MM/DD/YY">
                    </div>
                  </div>
                </div>

                <h4>Description Information</h4>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label class="col-form-label">Description </label>
                    <textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
                  </div>
                </div>
                <h4>Tag Information</h4>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label class="col-form-label">Tag List</label>
                    <input type="text" class="form-control" name="tag-name" placeholder="Tag List">
                  </div>
                </div>
                <h4>Permissions</h4>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label">Permission</label>
                    <select class="form-control">
                      <option>Task Visibility</option>
                      <option>Private Task</option>
                    </select>
                  </div>

                </div>
                <div class="text-center py-3">
                  <button type="button"
                    class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                  <button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div>
  <!-- modal -->
