<?PHP

    $id = $_GET['id'];

//    alert($id);

?>





<html>

<head>
    <title>Data Visualization For Literacy</title>

    <!-- JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="scripts/common.js"></script>
    <script src="scripts/basic.js"></script>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>


    <!-- CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/common.css">
    <link rel="stylesheet" type="text/css" href="style/basic.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        //send id to javascript function
        var id = '<?php echo $id; ?>';

        configureCustomDV4L(id);

    </script>

</head>

<!-- HTML -->

<body>

    
        <div class="col1">
            <img class="logo" src="img/HistoryInDatalogolight.png">
                

                
                

            <div style="width: 100%">
                <h2 style="display: inline-block;">Data</h2>
<!--                 <button id="clear" onclick="clearAllValues()" style="float: right; margin-left: 10px; margin-top: 30px;">CLEAR</button>-->
                <button id="default" onclick="switchToDefault()"
                    style="float: right; margin-left: 10px; margin-top: 30px;">DEFAULT</button>
                
                 <button id="modal-btn" onclick="displayModal()" style="float: right; margin-left: 10px; margin-top: 30px;">ENTER DRIVING QUESTION</button>
                 
                 <button id="help" data-tooltip="" onclick="" style="float: right; margin-left: 10px; margin-top: 30px;">HELP</button>
                 
                 

                 
                 <script>
                     
                     tippy('#help', {
                         placement: 'bottom',
                         content: '<img src="help.gif" > ',
                         allowHTML: true,
                         maxWidth: '800px',
                         animation: 'scale',

                     });
                     
                     tippy('#default', {
                            content: 'Return to default databases',
                     });
                     
                 </script>
              
              
              <div class="modal" id="modalbox">
                    
                    
                    
                    
                    <div class="modal-content" id="content">
                        <span class="close-btn" onclick="closeModal()">&times;</span>
                       
                       <div id="text">
                       <label style="font-size: 30px"  for="dqs"> Select or Enter a Driving Question:</label><br>
                      
                       <label for="dqs">Select a Driving Question:</label>
                       <span class="material-icons" id="tooltip1">help_outline</span> <br>
                       <select style="width: 75%" id="textinput" onchange="addDrivingQuestion()">
                           <option disabled selected>Select Driving Question</option>
                           <option>How do rates of population growth among countries in the same region/continent compare?
                               What explains observed differences?</option>
                           <option>What accounts for sharp increases or decreases in military spending? Do increases in
                               military spending seem to be cause, consequence, or deterrent of violent conflict? </option>
                           <option>Is there a consistent relationship between child mortality rates and births per women?
                               What explains consistencies and inconsistencies in this relationship across countries?
                           </option>
                           <option>How do CO2 emissions per capita compare among countries? What are the implications of
                               similarities/differences for national/international policymaking?</option>

                       </select>
                       
                       <br>OR<br>
                       
                       <label for="customDQ">Enter a Custom Driving Question:</label><br>
                       <input style="width: 75%" placeholder="Enter Driving Question here" id="textinput2"
                           name="textinput2" value="" autocomplete="off" onkeyup="addDrivingQuestion2()"></input>
                       
                       
                       <br><br>
                       
                       <label id="checkboxLabel"> All Databases: </label><br>
                       
                       
                       <center >
                           
                           
                       <div id="checkboxlist" >
                           
                           <label>
                           <input type="checkbox" /> This is checkbox <br />
                           </label>
                           
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                               <input type="checkbox" /> This is checkbox <br />
                       </div>
                       
                       
                       <br><br>
                       
                       <label id="selectedDatabases"> Selected Databases: </label><span class="material-icons" id="tooltip2">help_outline</span> <br>
                       
                       
                       <center>
                           
                       <div id="selectedList" >
                           
<!--                          this is the selected list div-->
                        <label>
                            No Selected Databases
                        </label>
                          
                       </div>
                       
                       
                       <br><br>
                       
                       <button  id="default" type="button" class=""  onclick="useSelected()"                                                style="width:200px"> Use These Databases</button>
                       
                       <br><br>
                       </center>
                   </form>
                   
                   
                    </div>
                       
                    </div>
                    
                    
                    
                </div>


                <div class="input">
                    
                <div>
                    <h3 style="margin-top: 10px;font-size:30px;font-weight: bold;">Driving Question:</h3>
                    
                   
                    <p id="textEntered">Not Selected</p>
                </div>
            </div>
           
           </div>
          
          
          <br>
            
            <div class="row">
                <h3 style="margin-top: 10px;font-size:30px;font-weight: bold;">Graph 1:</h3>


                <form>
                    Database (y-axis):
                    <select style="width:200px" name="db" class="select" id="database1" onchange="verifyDB(1)" >
                    </select>
                </form>

              

                <p></p>
                

                Location:
                <select name="loc" class="select" id="yaxis1" onchange="verifyOptions(1)">
                    <option value="" selected></option>
                </select>
                <p></p>

                Year Range (x-axis):
                <div style="margin-left: 7px; width: 75%; display: inline-block;">
                    <input type="text" class="js-range-slider" id="range1" value="" />
                </div>
                <p></p>

                <div style="display: inline-block; position: relative;">
                    Graph type:
                    <select name="gty" class="select" id="gtype1" onchange="verifyOptions(1)">
                        <option value="" selected></option>
                        <option value="line">line</option>
                        <option value="bar">bar</option>
                    </select>
                    <div style="display: inline-block; position: relative;">
                        <c style="margin-left: 10px;">Color:</c>
                        <button class="colorButton" id="colorButton1" onclick="showColorWheel(1)"></button>
                        <div class="colorwheelMenu" id="colorWheel1">
                            <item style="background-color: #6f6f6f" onclick="changeColorButton(1,'gray')"></item>
                            <item style="background-color: #ffffff" onclick="changeColorButton(1,'white')"></item>
                            <item style="background-color: #f81b02" onclick="changeColorButton(1,'red')"></item>
                            <item style="background-color: #ff388c" onclick="changeColorButton(1,'pink')"></item>
                            <item style="background-color: #543005" onclick="changeColorButton(1,'darkBrown')"></item>
                            <item style="background-color: #a6611a" onclick="changeColorButton(1,'brown')"></item>
                            <item style="background-color: #f09415" onclick="changeColorButton(1,'orange')"></item>
                            <item style="background-color: #f2d908" onclick="changeColorButton(1,'yellow')"></item>
                            <item style="background-color: #9acd4c" onclick="changeColorButton(1,'lightGreen')"></item>
                            <item style="background-color: #549e39" onclick="changeColorButton(1,'green')"></item>
                            <item style="background-color: #31b6fd" onclick="changeColorButton(1,'lightBlue')"></item>
                            <item style="background-color: #0f6fc6" onclick="changeColorButton(1,'blue')"></item>
                            <item style="background-color: #294171" onclick="changeColorButton(1,'darkBlue')"></item>
                            <item style="background-color: #663366" onclick="changeColorButton(1,'darkPurple')"></item>
                            <item style="background-color: #ac3ec1" onclick="changeColorButton(1,'purple')"></item>
                            <item style="background-color: #af8dc3" onclick="changeColorButton(1,'lightPurple')"></item>
                        </div>
                    </div>
                </div>
                <p></p>

                <button class="submit" id="submit1" onclick="submitGraphData(1)">SUBMIT</button>
            </div>
            <p></p>
            
            <div class="row">
                <h3 style="margin-top: 10px;font-weight: bold;font-size:30px">Graph 2:</h3>

                Database (y-axis):
                <select style="width:200px" class="select" id="database2" onchange="verifyDB(2)" >
                </select>
                
                <p></p>

                Location:
                <select class="select" id="yaxis2" onchange="verifyOptions(2)">
                    <option value="" selected></option>
                </select>
                <p></p>

                Year Range (x-axis):
                <div style="margin-left: 7px; width: 75%; display: inline-block;">
                    <input type="text" class="js-range-slider" id="range2" value="" />
                </div>
                <p></p>

                <div style="display: inline-block; position: relative;">
                    Graph type:
                    <select class="select" id="gtype2" onchange="verifyOptions(2)">
                        <option value="" selected></option>
                        <option value="line">line</option>
                        <option value="bar">bar</option>
                    </select>
                    <div style="display: inline-block; position: relative;">
                        <c style="margin-left: 10px;">Color:</c>
                        <button class="colorButton" id="colorButton2" onclick="showColorWheel(2)"></button>
                        <div class="colorwheelMenu" id="colorWheel2">
                            <item style="background-color: #6f6f6f" onclick="changeColorButton(2,'gray')"></item>
                            <item style="background-color: #ffffff" onclick="changeColorButton(2,'white')"></item>
                            <item style="background-color: #f81b02" onclick="changeColorButton(2,'red')"></item>
                            <item style="background-color: #ff388c" onclick="changeColorButton(2,'pink')"></item>
                            <item style="background-color: #543005" onclick="changeColorButton(2,'darkBrown')"></item>
                            <item style="background-color: #a6611a" onclick="changeColorButton(2,'brown')"></item>
                            <item style="background-color: #f09415" onclick="changeColorButton(2,'orange')"></item>
                            <item style="background-color: #f2d908" onclick="changeColorButton(2,'yellow')"></item>
                            <item style="background-color: #9acd4c" onclick="changeColorButton(2,'lightGreen')"></item>
                            <item style="background-color: #549e39" onclick="changeColorButton(2,'green')"></item>
                            <item style="background-color: #31b6fd" onclick="changeColorButton(2,'lightBlue')"></item>
                            <item style="background-color: #0f6fc6" onclick="changeColorButton(2,'blue')"></item>
                            <item style="background-color: #294171" onclick="changeColorButton(2,'darkBlue')"></item>
                            <item style="background-color: #663366" onclick="changeColorButton(2,'darkPurple')"></item>
                            <item style="background-color: #ac3ec1" onclick="changeColorButton(2,'purple')"></item>
                            <item style="background-color: #af8dc3" onclick="changeColorButton(2,'lightPurple')"></item>
                        </div>
                    </div>
                </div>
                <p></p>

                <button class="submit" id="submit2" onclick="submitGraphData(2)">SUBMIT</button>
            </div>
            <div id="themeToggle" style="margin-top: 5px;">
                <c style="font-size: 12px;">Light</c>
                <input type="checkbox" unchecked data-toggle="toggle" data-onstyle="primary" data-on=" "
                    data-offstyle="info" data-off=" " data-size="sm" onchange="changeColorTheme(this)">
                <c style="font-size: 12px;">Dark</c>
            </div>
        </div>

        <div class="col2">
            <h2>Graphs</h2>
            <div id="driving_question" style="font-size: 14px"></div>

            <div class="graphRegion" ondrop="drop(event, 'graph1')" ondragover="allowDrop(event)"
                >
                <canvas id="canvas1"></canvas>
                <button class="saveButton" id="save1" draggable="true" ondragstart="drag(event, 'graph1')">SAVE GRAPH 1
                    

                    <!--                <div class="hoverTip"> DRAG TO THE RIGHT TO SAVE GRAPH </div>-->
                
                </button>
                <button class="export" id="export1" onclick="exportGraph(1);">EXPORT</button>
                
                <button class="saveButton" style="margin-left: 5px; cursor:pointer;" id="source1" onclick="displaySource(1)">SOURCE</button>

            </div>

            <br><br>
            <div class="graphRegion" ondrop="drop(event, 'graph2')" ondragover="allowDrop(event)"
               >
                <canvas id="canvas2"></canvas>
                <button class="saveButton" id="save2" draggable="true" ondragstart="drag(event, 'graph2')">SAVE GRAPH 2
                    </button>
                <button class="export" id="export2" onclick="exportGraph(2);">EXPORT</button>
                
                <button class="saveButton" style="margin-left: 5px; cursor:pointer;" id="source2" onclick="displaySource(2)">SOURCE</button>

            </div>
        </div>

        <div class="col3">
            <div id="themeToggle" style="margin-top: 5px;">
                <h2>Saved Graphs</h2> <span class="material-icons" id="tooltip3">help_outline</span> <br>
                <p align="right">
                    <c style="font-size: 20px;text-align:right">Add Notes</c>
                    <input type="checkbox" unchecked data-toggle="toggle" data-onstyle="primary" data-on=" "
                        data-offstyle="info" data-off=" " data-size="sm" onchange="addNotes(this)">
                </p>
            </div>

            <br>
            <div class="pillar">

                <div class="frame" id="frame1">
                    <div class="tile" ondrop="drop(event, 'saved1')" ondragover="allowDrop(event)"
                        onclick="showToolTip(1)">
                        <div class="tooltiptext" id="tip1"></div>
                        <canvas id="saved1"></canvas>
                        <a id="exit1" class="exit" onclick="deleteGraph(1)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap1" class="swap" draggable="true" ondragstart="drag(event, 'saved1')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust1" onmouseover="showToolTip(1)" onmouseleave="showToolTip(1)" onclick="customize(1)"> Customize </button>
                </div>
                

                <div class="frame">
                    <div class="tile" ondrop="drop(event, 'saved2')" ondragover="allowDrop(event)"
                        onclick="showToolTip(2)">
                        <span class="tooltiptext" id="tip2"></span>
                        <canvas id="saved2"></canvas>
                        <a id="exit2" class="exit" onclick="deleteGraph(2)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap2" class="swap" draggable="true" ondragstart="drag(event, 'saved2')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust2" onmouseover="showToolTip(2)" onmouseleave="showToolTip(2)" onclick="customize(2)"> Customize </button>
                </div>

                <div class="frame">
                    <div class="tile" ondrop="drop(event, 'saved3')" ondragover="allowDrop(event)"
                        onclick="showToolTip(3)">
                        <span class="tooltiptext" id="tip3"></span>
                        <canvas id="saved3"></canvas>
                        <a id="exit3" class="exit" onclick="deleteGraph(3)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap3" class="swap" draggable="true" ondragstart="drag(event, 'saved3')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust3" onmouseover="showToolTip(3)" onmouseleave="showToolTip(3)" onclick="customize(3)"> Customize </button>
                </div>

                <div class="frame" id="hide1">
                    <div class="tile" ondrop="drop(event, 'saved4')" ondragover="allowDrop(event)"
                        onclick="showToolTip(4)">
                        <span class="tooltiptext" id="tip4"></span>
                        <canvas id="saved4"></canvas>
                        <a id="exit4" class="exit" onclick="deleteGraph(4)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap4" class="swap" draggable="true" ondragstart="drag(event, 'saved4')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust4" onmouseover="showToolTip(4)" onmouseleave="showToolTip(4)" onclick="customize(4)"> Customize </button>
                </div>

                <div class="frame" id="hide2">
                    <div class="tile" ondrop="drop(event, 'saved5')" ondragover="allowDrop(event)"
                        onclick="showToolTip(5)">
                        <span class="tooltiptext" id="tip5"></span>
                        <canvas id="saved5"></canvas>
                        <a id="exit5" class="exit" onclick="deleteGraph(5)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap5" class="swap" draggable="true" ondragstart="drag(event, 'saved5')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust5" onmouseover="showToolTip(5)" onmouseleave="showToolTip(5)" onclick="customize(5)"> Customize </button>
                </div>
            </div>
            <div class="pillar">
                <div class="frame">
                    <div class="tile" ondrop="drop(event, 'saved6')" ondragover="allowDrop(event)"
                        onclick="showToolTip(6)">
                        <span class="tooltiptext" id="tip6"></span>
                        <canvas id="saved6"></canvas>
                        <a id="exit6" class="exit" onclick="deleteGraph(6)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap6" class="swap" draggable="true" ondragstart="drag(event, 'saved6')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust6" onmouseover="showToolTip(6)" onmouseleave="showToolTip(6)" onclick="customize(6)"> Customize </button>
                </div>

                <div class="frame">
                    <div class="tile" onclick="showToolTip(7)" ondrop="drop(event, 'saved7')"
                        ondragover="allowDrop(event)">
                        <span class="tooltiptext" id="tip7"></span>
                        <canvas id="saved7"></canvas>
                        <a id="exit7" class="exit" onclick="deleteGraph(7)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap7" class="swap" draggable="true" ondragstart="drag(event, 'saved7')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust7" onmouseover="showToolTip(7)" onmouseleave="showToolTip(7)" onclick="customize(7)"> Customize </button>
                </div>

                <div class="frame">
                    <div class="tile" onclick="showToolTip(8)" ondrop="drop(event, 'saved8')"
                        ondragover="allowDrop(event)">
                        <span class="tooltiptext" id="tip8"></span>
                        <canvas id="saved8"></canvas>
                        <a id="exit8" class="exit" onclick="deleteGraph(8)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap8" class="swap" draggable="true" ondragstart="drag(event, 'saved8')">&#x21c4;
     M                       <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust8" onmouseover="showToolTip(8)" onmouseleave="showToolTip(8)" onclick="customize(8)"> Customize </button>
                </div>

                <div class="frame" id="hide3">
                    <div class="tile" onclick="showToolTip(9)" ondrop="drop(event, 'saved9')"
                        ondragover="allowDrop(event)">
                        <span class="tooltiptext" id="tip9"></span>
                        <canvas id="saved9"></canvas>
                        <a id="exit9" class="exit" onclick="deleteGraph(9)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap9" class="swap" draggable="true" ondragstart="drag(event, 'saved9')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust9" onmouseover="showToolTip(9)" onmouseleave="showToolTip(9)" onclick="customize(9)"> Customize </button>
                </div>

                <div class="frame" id="hide4">
                    <div class="tile" onclick="showToolTip(10)" ondrop="drop(event, 'saved10')"
                        ondragover="allowDrop(event)">
                        <span class="tooltiptext" id="tip10"></span>
                        <canvas id="saved10"></canvas>
                        <a id="exit10" class="exit" onclick="deleteGraph(10)">x
                            <div class="hoverTip">delete</div>
                        </a>
                        <a id="swap10" class="swap" draggable="true" ondragstart="drag(event, 'saved10')">&#x21c4;
                            <div class="hoverTip">transfer (drag & drop)</div>
                        </a>
                    </div>
                    <br>
                        <button class="customize" id="cust10" onmouseover="showToolTip(10)" onmouseleave="showToolTip(10)" onclick="customize(10)"> Customize </button>
                </div>
            </div>

            <!-- Notes code by DG -->
            <div id="myNotes" style="display:none;">
                <h2>Notes</h2>
                <textarea id="notes" rows="10" cols="40" value=""></textarea>
                <br><br>
                <button class="export" onclick="exportNotes()">EXPORT NOTE</button>
            </div>

        </div>
    
    <script>
        //hover tool tip code
        
        tippy('#tooltip1', {
               content: 'Based on your driving question, there will be suggested databases. Select the databases that can be used to answer your driving question.',
               placement: "bottom",
        });
        
        tippy('#tooltip2', {
           content: "The databases that you select will populate the Y-Axis drop down menus.",
           placement: "bottom",
        });
        
        tippy('#tooltip3', {
           content: "Click on the saved graphs to view the json code",
           placement: "bottom",
        });
        
        tippy('#save1', {
           content: "Drag to an empty save slot to the right",
           placement: "bottom",
        });
        
        tippy('#save2', {
           content: "Drag to an empty save slot to the right",
           placement: "bottom",
        });
        
        tippy('#source1', {
           content: "View the source for the database",
           placement: "bottom",
        });
        
        tippy('#source2', {
           content: "View the source for the database",
           placement: "bottom",
        });
        
        
        tippy('#cust1', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust2', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust3', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust4', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust5', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust6', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust7', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust8', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust9', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        tippy('#cust10', {
           content: "Modify the json code in the scripting version of DV4L",
           placement: "bottom",
        });
        
        
        
        
    </script>

</body>

</html>


<!--
<script language = "php">

print "there";
$dsn = 'mysql:dbname=DV4L_schema; host=127.0.0.1';//local host
$user = 'root';
$password = 'Abbeyhills1';//change

$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $dbh->prepare("SELECT * FROM export");
$result = $dbh->query($sql);

if ($result -> num_rows >0){
    while($row = $result->fetch_assoc()) {
        echo "sessionid: " . $row["sessionid"]"<br>";
      }//while
}//if

else {
    echo "no results";
}
$dbh -> close();

</script>
-->

