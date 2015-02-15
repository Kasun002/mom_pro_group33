<!DOCTYPE html>
<html>
    <head>
        <title>MOM PRO SHEDULE</title>
        <!-- demo stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>

        <link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <link rel="stylesheet" type="text/css" href="style.css">
        <link type="text/css" rel="stylesheet" href="themes/calendar_g.css" />    
        <link type="text/css" rel="stylesheet" href="themes/calendar_green.css" />    
        <link type="text/css" rel="stylesheet" href="themes/calendar_traditional.css" />    
        <link type="text/css" rel="stylesheet" href="themes/calendar_transparent.css" />    
        <link type="text/css" rel="stylesheet" href="themes/calendar_white.css" />    

        <!-- helper libraries -->
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

        <!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

    </head>
    <body style="background-color: #cccccc">
        
        <div class="col-lg-3" style="background-color: #cccccc">
            <br>
            <p class="text-center text-info h3"><b><em><i>WELLCOME ADMIN</i></em></b></p><br>
            <div class="col-lg-1"></div>
            
            <div class="col-lg-10">
                
                <img src="../images/admin.jpg" class="img-rounded center-block" width="180" height="180">
                
                <br><br>
                <div class="btn-group btn-group-justified">
                    <a href="../Event/index.php" class="btn btn-primary active">Doctor Schedule</a>
                </div>
                <br>
                <div class="btn-group btn-group-justified">
                    <a href="../appoinment/index.php" class="btn btn-primary">Appointment</a>
                </div>
                <br>
           
           
               
                <div class="btn-group btn-group-justified">
                    <a href="../admin/selectUser.php" class="btn btn-success">VIEW USERS DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../admin/insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../admin/updateHistory.php" class="btn btn-success">USER HISTORY</a>
                </div>
                <br>
                <div class="btn-group btn-group-justified">
                    <a href="../index.php" class="btn btn-danger" >Logout</a>
                </div>
                <br>
  
                
                
            </div>
        </div>
        
        <div class="col-lg-9" style=" background-color: #cccccc ">
            <p class="text-center text-primary h1"><b><em><i>MOMPRO Control Panel</i></em></b></p>
           
            <br>
        </div>
        
        
         

        <div class="col-lg-9">
           <div class="shadow"></div><br>
            <div class="hideSkipLink">
            </div>
            <div class="main">

                <div style="float:left; width: 160px;">
                    <div id="nav"></div>
                </div>
                <div style="margin-left: 160px;">




                    <div id="dp"></div>
                </div>

                <script type="text/javascript">

                    var nav = new DayPilot.Navigator("nav");
                    nav.showMonths = 3;
                    nav.skipMonths = 3;
                    nav.selectMode = "week";
                    nav.onTimeRangeSelected = function(args) {
                        dp.startDate = args.day;
                        dp.update();
                        loadEvents();
                    };
                    nav.init();

                    var dp = new DayPilot.Calendar("dp");
                    dp.viewType = "Week";

                    dp.onEventMoved = function(args) {
                        $.post("backend_move.php",
                                {
                                    id: args.e.id(),
                                    newStart: args.newStart.toString(),
                                    newEnd: args.newEnd.toString()
                                },
                        function() {
                            console.log("Moved.");
                        });
                    };

                    dp.onEventResized = function(args) {
                        $.post("backend_resize.php",
                                {
                                    id: args.e.id(),
                                    newStart: args.newStart.toString(),
                                    newEnd: args.newEnd.toString()
                                },
                        function() {
                            console.log("Resized.");
                        });
                    };

                    // event creating
                    dp.onTimeRangeSelected = function(args) {
                        var name = prompt("New event name:", "Event");
                        dp.clearSelection();
                        if (!name)
                            return;
                        var e = new DayPilot.Event({
                            start: args.start,
                            end: args.end,
                            id: DayPilot.guid(),
                            resource: args.resource,
                            text: name
                        });
                        dp.events.add(e);

                        $.post("backend_create.php",
                                {
                                    start: args.start.toString(),
                                    end: args.end.toString(),
                                    name: name
                                },
                        function() {
                            console.log("Created.");
                        });

                    };

                    dp.onEventClick = function(args) {
                        alert("clicked: " + args.e.id());
                    };

                    dp.init();

                    loadEvents();

                    function loadEvents() {
                        var start = dp.visibleStart();
                        var end = dp.visibleEnd();

                        $.post("backend_events.php",
                                {
                                    start: start.toString(),
                                    end: end.toString()
                                },
                        function(data) {
                            //console.log(data);
                            dp.events.list = data;
                            dp.update();
                        });
                    }

                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#theme").change(function(e) {
                            dp.theme = this.value;
                            dp.update();
                        });
                    });
                </script>

            </div>
            <div class="clear">
            </div>




        </div>


    </body>
</html>

