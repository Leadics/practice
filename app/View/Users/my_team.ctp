
    <?php $userData = $this->Session->read('User'); 
    //echo '<pre>';print_r($use);die;
    ?>

  <script src="<?php echo ABSOLUTE_URL;?>/js/go.js"></script>
  <link href="<?php echo ABSOLUTE_URL;?>/assets/css/goSamples.css" rel="stylesheet" type="text/css" />  <!-- you don't need to use this -->
 <!-- this is only for the GoJS Samples framework -->
 <style type="text/css">
 </style>
  <script id="code">
    function init() {
      if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
      var $ = go.GraphObject.make;  // for conciseness in defining templates

      myFullDiagram =
        $(go.Diagram, "fullDiagram",  // each diagram refers to its DIV HTML element by id
          {
            initialAutoScale: go.Diagram.UniformToFill,  // automatically scale down to show whole tree
            maxScale: 0.25,
            contentAlignment: go.Spot.Center,  // center the tree in the viewport
            isReadOnly: true,  // don't allow user to change the diagram
            "animationManager.isEnabled": false,
            layout: $(go.TreeLayout,
                      { angle: 90, sorting: go.TreeLayout.SortingAscending }),
            maxSelectionCount: 1,  // only one node may be selected at a time in each diagram
            // when the selection changes, update the myLocalDiagram view
            "ChangedSelection": showLocalOnFullClick,
            "toolManager.hoverDelay": 10 
          });

      myLocalDiagram =  // this is very similar to the full Diagram
        $(go.Diagram, "localDiagram",
          {
            autoScale: go.Diagram.UniformToFill,
            contentAlignment: go.Spot.Center,
            minScale:0.50,
            isReadOnly: true,
            layout: $(go.TreeLayout,
                      { angle: 90, sorting: go.TreeLayout.SortingAscending }),
            "LayoutCompleted": function(e) {
              var sel = e.diagram.selection.first();
              if (sel !== null) myLocalDiagram.scrollToRect(sel.actualBounds);
            },
            maxSelectionCount: 1,
            // when the selection changes, update the contents of the myLocalDiagram
            "ChangedSelection": showLocalOnLocalClick,
            "toolManager.hoverDelay": 10 
          });
       
      // Define a node template that is shared by both diagrams
      var myNodeTemplate =
        $(go.Node, "Vertical",
          $(go.Picture,
            { margin: 10, width: 50, height: 50, background: "#DAE4E4" },
            new go.Binding("source")),
           $(go.TextBlock, "Default Text",
      { stroke: "black", font: "bold 14px sans-serif" },
      new go.Binding("text", "key")),
            { // this tooltip shows the name and picture of the kitten
            toolTip:
              $(go.Adornment, "Auto",
                $(go.Shape, { fill: "lightyellow" }),
                $(go.Panel, "Vertical",
                  
                  $(go.TextBlock, { margin: 3, width: 150  },
                    new go.Binding("text", "tool"))
                )
              )  // end Adornment
          }
          
        );
      // var myNodeTemplate =
      //   $(go.Node, "Auto",
      //     { locationSpot: go.Spot.Center },
      //     new go.Binding("text", "key", go.Binding.toString),  // for sorting
      //     $(go.Shape, "Rectangle",
      //       new go.Binding("fill", "color"),
      //       { stroke: null }),
      //     $(go.TextBlock,
      //       { margin: 5 },
      //       new go.Binding("text", "key", function(k) { return  k; }))
      //   );
      myFullDiagram.nodeTemplate = myNodeTemplate;
      myLocalDiagram.nodeTemplate = myNodeTemplate;

      // Define a basic link template, not selectable, shared by both diagrams
      var myLinkTemplate =
        $(go.Link,
          { routing: go.Link.Normal, selectable: false },
          $(go.Shape,
            { strokeWidth: 1 })
        );
      myFullDiagram.linkTemplate = myLinkTemplate;
      myLocalDiagram.linkTemplate = myLinkTemplate;

      // Create the full tree diagram
      setupDiagram();

      // Create a part in the background of the full diagram to highlight the selected node
      // highlighter =
      //   $(go.Part, "Auto",
      //     {
      //       layerName: "base",
      //       selectable: false,
      //       isInDocumentBounds: false,
      //       locationSpot: go.Spot.Center
      //     },
      //     $(go.Shape, "Ellipse",
      //       {
      //         fill: $(go.Brush, "Radial", { 0.0: "#DAE4E4", 1.0: "#DAE4E4" }),
      //         stroke: null,
      //         desiredSize: new go.Size(400, 400)
      //       })
      //     );
      // //myFullDiagram.add(highlighter);

      // Start by focusing the diagrams on the node at the top of the tree.
      // Wait until the tree has been laid out before selecting the root node.
      myFullDiagram.addDiagramListener("InitialLayoutCompleted", function(e) {
        var node0 = myFullDiagram.findPartForKey("<?php echo $use['0']['username'];?>");
        if (node0 !== null) node0.isSelected = true;

        showLocalOnFullClick();
      });
    }

    // Make the corresponding node in the full diagram to that selected in the local diagram selected,
    // then call showLocalOnFullClick to update the local diagram.
    function showLocalOnLocalClick() {
      var selectedLocal = myLocalDiagram.selection.first();
      if (selectedLocal !== null) {
        // there are two separate Nodes, one for each Diagram, but they share the same key value
        myFullDiagram.select(myFullDiagram.findPartForKey(selectedLocal.data.key));
        //window.location = "<?php echo ABSOLUTE_URL?>/users/makeSession/"+selectedLocal.data.key;
        //myFullDiagram.select(myFullDiagram.findPartForKey(selectedLocal.data.key));
      }
    }

    function showLocalOnFullClick() {
      var node = myFullDiagram.selection.first();
      if (node !== null) {
        // make sure the selected node is in the viewport
        myFullDiagram.scrollToRect(node.actualBounds);
        // move the large yellow node behind the selected node to highlight it
        //highlighter.location = node.location;
        // create a new model for the local Diagram
        var model = new go.TreeModel();
        // add the selected node and its children and grandchildren to the local diagram
        var nearby = node.findTreeParts(3);  // three levels of the (sub)tree
        // add parent and grandparent
        // var parent = node.findTreeParentNode();
        // if (parent !== null) {
        //   nearby.add(parent);
        //   var grandparent = parent.findTreeParentNode();
        //   if (grandparent !== null) {
        //     nearby.add(grandparent);
        //   }
        // }
        // create the model using the same node data as in myFullDiagram's model
        nearby.each(function(n) {
            if (n instanceof go.Node) model.addNodeData(n.data);
          });
        myLocalDiagram.model = model;
        // select the node at the diagram's focus
        var selectedLocal = myLocalDiagram.findPartForKey(node.data.key);
        if (selectedLocal !== null) selectedLocal.isSelected = true;
      }
    }

    // Create the tree model containing TOTAL nodes, with each node having a variable number of children
    function setupDiagram(total) {
      total = "<?php echo count($use);?>";  // default to 100 nodes
      //alert(total);
      var nodeDataArray = [];

     <?php  foreach ($use as $key => $value) { ?>
        nodeDataArray.push({
          key: "<?php echo $value['username'];?>",
          parent:"<?php echo $value['sponcer'];?>",
          source: "<?php echo $value['image']?>",
          tool : "<?php echo 'Name : '.$value['name'].' \n Sponcer: '.$value['sponcer'].' \n  Amount : '.$value['donation'].'  \nLeft Business : '.$value['business']['left'].' \nRight Business : '.$value['business']['right'];?>"
        });

       <?php  } ?>
      myFullDiagram.model = new go.TreeModel(nodeDataArray);
    }
  </script>
<body onload="init()">
<section id="main-content">
    <section class="wrapper">
        <div id="work" class="row" > 
              <div id="fullDiagram" style="height:250px;width:100%;border:1px solid black;margin:2px; background-color: #DAE4E4;"></div>
              <div id="localDiagram" style="height:330px;width:100%;border:0px solid black;margin:2px; background-color: #DAE4E4;"></div>  
        </div>
    </section>
</section>
</body>
