<style type="text/css">
  .text-bold{color:#000000 ;}
</style>

<div class=" col-md-8 col-md-offset-2"  style="margin-top: 20px;">
    <div>
        <h3 class="text-center" >Set Weekly limit for ROI</h3>
    </div>
    <div>
        <form id="lactivationForm" enctype="multipart/form-data" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/setWeekly" data-toggle="validator" >
            <div class="form-group control-group">
            <table class="table table-striped table-responsive">
              <tr>
                <td>Learner</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[learner]" name="learner" >
                        <option value="">Please select ROI</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>PRE –TRADER</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[pretrader]" name="pretrader" >
                        <option value="">Please select ROI</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>TRADER</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[pre-trader]" name="pre-trader" >
                        <option value="">Please select ROI</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>PRE –TRADER</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[trader]" name="trader" >
                        <option value="">Please select ROI</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>PRE –TRADER</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[pro-trader]" name="pro-trader" >
                        <option value="">Please select ROI</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>MERCHANT</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[merchant]" name="merchant" >
                        <option value="">Please select ROI</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="3">8</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>EXCHANGER</td>
                <td>
                  <select type="integer" required="" class="form-control" id="data[exchanger]" name="exchanger" >
                        <option value="">Please select ROI</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </td>
              </tr>
            </table>
            </div>
               
              <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
    </div>
</div>
