<script type="text/javascript">
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateBinary/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
             if (!obj.binary.amount) {
                obj.binary.amount = 0;
            } 
            $("#binaryamount").append(obj.binary.amount);
            $("#binarylable").append(obj.binary.Membership);
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateReferals/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
            if (!obj.referal.amount) {
                obj.referal.amount = 0;
            } 
            $("#referalamount").append(obj.referal.amount);
            $("#referallable").append(obj.referal.Membership);
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateMatrix/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data);
            if (!obj.membership.amount) {
                obj.membership.amount = 0;
            } 
            // $("#matrixamount").append(obj.membership.amount);
            // $("#matrixlable").append(obj.membership.Membership);
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateSingleLag/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
            if (!obj.singlelag.amount) {
                obj.singlelag.amount = 0;
            } 
            $("#singlelagamount").append(obj.singlelag.amount);
            $("#singlelaglable").append(obj.singlelag.Membership);
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/getRoi/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {

            var obj = JSON.parse(data); 
            console.log(obj);
            if (!obj.roi.amount) {
                obj.roi.amount = 0;
            } 
            //$("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.roi.Membership+'</h4><h3 class="text-danger text-center">'+obj.roi.amount+'</h3></div></div>');
            $("#roiamount").append(obj.roi.amount);
            $("#roilable").append(obj.roi.Membership);
        }
    });
</script>
<section id="main-content"> 
  <section class="wrapper">            
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>                          
            </ol>
        </div>
    </div>
    <div id="flash" class=" alert alert-success">
        <?php echo $this->Session->flash();?>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box magenta-bg">
                <i class="fa fa-tree"></i>
                <div class="count" id="binaryamount"></div>
                <div class="title" id="binarylable"></div>                       
            </div><!--/.info-box-->         
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
                <i class="fa fa-money"></i>
                <div class="count" id="roiamount"></div>
                <div class="title" id="roilable"></div>                      
            </div><!--/.info-box-->         
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
                <i class="fa fa-share-alt"></i>
                <div class="count" id="referalamount"></div>
                <div class="title" id="referallable"></div>                      
            </div><!--/.info-box-->         
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
                <i class="fa fa-cubes"></i>
                <div class="count" id="singlelagamount"></div>
                <div class="title" id="singlelaglable"></div>                      
            </div><!--/.info-box-->         
        </div><!--/.col-->
        
    </div><!--/.row-->

    
   <div class="row">
    <div class="col-lg-9 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
                    <div class="panel-actions">
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>  
                </div>
                <div class="panel-body-map">
                    <div id="map" style="height:380px;"></div>  
                </div>

            </div>
        </div>
      <div class="col-md-3">
      <!-- List starts -->
        <ul class="today-datas">
        <h3>Statics    <span><i class="fa fa-line-chart "></i></span> </h3>
        <!-- List #1 -->
        <li>
          <!-- Graph -->
          <div><span id="todayspark1" class="spark"></span></div>
          <!-- Text -->
          <div class="datas-text"><?php echo 1000+rand(1,1000) ;?> visitors/day</div>
        </li>
        <li>
          <div><span id="todayspark2" class="spark"></span></div>
          <div class="datas-text"><?php echo 2000+rand(1,2000) ;?> Pageviews</div>
        </li>
        <li>
          <div><span id="todayspark4" class="spark"></span></div>
          <div class="datas-text">$<?php echo 10000+rand(1,10000) ;?> Revenue/Day</div>
        </li> 
        <li>
          <div><span id="todayspark5" class="spark"></span></div>
          <div class="datas-text"><?php echo 100000+rand(1,100000) ;?> visitors every Month</div>
        </li>                
      </ul>
      </div>
      
     
   </div>  
    
  
  <!-- Today status end -->
    
      
        
    <div class="row">
        
        <div class="col-lg-9 col-md-12">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
                    <div class="panel-actions">
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/ang/index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table bootstrap-datatable countries">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Country</th>
                                <th>Users</th>
                                <th>Amount in $</th>
                                <th>Performance</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                <td>Germany</td>
                                <td><?php echo $CountryData[0]['users'];?></td>
                                <td><?php echo $CountryData[0]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[0]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[0]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[0]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[0]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[0]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/India.png" style="height:18px; margin-top:-2px;"></td>
                                <td>India</td>
                                <td><?php echo $CountryData[1]['users'];?></td>
                                <td><?php echo $CountryData[1]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[1]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[1]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[1]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[1]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[1]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Spain.png" style="height:18px; margin-top:-2px;"></td>
                                <td>Spain</td>
                                <td><?php echo $CountryData[2]['users'];?></td>
                                <td><?php echo $CountryData[2]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[2]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[2]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[2]['avg'];?> aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 100 - $CountryData[2]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[2]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/India.png" style="height:18px; margin-top:-2px;"></td>
                                <td>Russia</td>
                                <td><?php echo $CountryData[3]['users'];?></td>
                                <td><?php echo $CountryData[3]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[3]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[3]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[3]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[3]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[3]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Spain.png" style="height:18px; margin-top:-2px;"></td>
                                <td>USA</td>
                                <td><?php echo $CountryData[4]['users'];?></td>
                                <td><?php echo $CountryData[4]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[4]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[4]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[4]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[4]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[4]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                <td>Brazil</td>
                                <td><?php echo $CountryData[5]['users'];?></td>
                                <td><?php echo $CountryData[5]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[5]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[5]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[5]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[5]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[5]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                <td>Coloumbia</td>
                                <td><?php echo $CountryData[6]['users'];?></td>
                                <td><?php echo $CountryData[6]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[6]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[6]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[6]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[6]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[6]['avg'];?>%</span>    
                                </td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo ABSOLUTE_URL;?>/ang/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                <td>France</td>
                                <td><?php echo $CountryData[7]['users'];?></td>
                                <td><?php echo $CountryData[7]['amount'];?></td>
                                <td>
                                    <div class="progress thin">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $CountryData[7]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $CountryData[7]['avg'];?>%">
                                        </div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo 100 - $CountryData[7]['avg'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100 - $CountryData[7]['avg'];?>%">
                                        </div>
                                    </div>
                                    <span class="sr-only"><?php echo $CountryData[7]['avg'];?>%</span>    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>  

        </div><!--/col-->
        <div class="col-md-3">
            
            <div class="social-box facebook">
                <i class="fa fa-facebook"></i>
                <ul>
                    <li>
                        <strong>256k</strong>
                        <span>friends</span>
                    </li>
                    <li>
                        <strong>359</strong>
                        <span>feeds</span>
                    </li>
                </ul>
            </div><!--/social-box-->
        </div>
        <div class="col-md-3">
            
            <div class="social-box google-plus">
                <i class="fa fa-google-plus"></i>
                <ul>
                    <li>
                        <strong>962</strong>
                        <span>followers</span>
                    </li>
                    <li>
                        <strong>256</strong>
                        <span>circles</span>
                    </li>
                </ul>
            </div><!--/social-box-->            
            
        </div><!--/col-->
        <div class="col-md-3">
            
            <div class="social-box twitter">
                <i class="fa fa-twitter"></i>
                <ul>
                    <li>
                        <strong>1562k</strong>
                        <span>followers</span>
                    </li>
                    <li>
                        <strong>2562</strong>
                        <span>tweets</span>
                    </li>
                </ul>
            </div><!--/social-box-->            
            
        </div><!--/col-->
        
      </div>

            
           
        <!-- statics end -->
      
    
        

      <!-- project team & activity start -->
  
</section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->

 
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
    $(function(){
        var val;
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/getMapData',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
            // if (!obj.singlelag.amount) {
            //     obj.singlelag.amount = 0;
            // } 
            
            statesValues = jvm.values.apply({}, jvm.values(data.states)),
            metroPopValues = Array.prototype.concat.apply([], jvm.values(data.registration)),
            metroUnemplValues = Array.prototype.concat.apply([], jvm.values(data.amount));
        
    // $.getJSON('<?php echo ABSOLUTE_URL;?>/crons/getMapData', function(data){
    //     var val = 2009;
    //     console.log(data);
    //     statesValues = jvm.values.apply({}, jvm.values(data.states)),
    //     metroPopValues = Array.prototype.concat.apply([], jvm.values(data.registration)),
    //    UnemplValues = Array.prototype.concat.apply([], jvm.values(data.amount));

      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
        markers: [{
          attribute: 'fill',
          scale: ['#FEE5D9', '#A50F15'],
          values: data.amount,
          min: jvm.min(metroUnemplValues),
          max: jvm.max(metroUnemplValues)
        },{
          attribute: 'r',
          scale: [5, 20],
          values: data.registration,
          min: jvm.min(metroPopValues),
          max: jvm.max(metroPopValues)
        }],
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
      }
    });
    });

  </script>

  </body>
</html>
