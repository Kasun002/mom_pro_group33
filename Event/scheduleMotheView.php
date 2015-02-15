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
    <body >
        <div class="container">
            <br>
            <ul class="nav nav-tabs">
                
                <li><a href="../profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
                <li><a href="../forum/index.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
                <li><a href="../appoinment/mother_view.php"><span class="glyphicon glyphicon-briefcase"> Appointment</span></a></li>
                <li class="active"><a href="scheduleMotheView.php"><span class="glyphicon glyphicon-bell"> Schedule</span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-bell"> Report Analyzer</span></a></li>
                <li><a href="../Track/track.php"><span class="glyphicon glyphicon-bell"> Tracker</span></a></li>
                <li><a href="../contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
                <li><a href="../aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
                <a href="../index.php"><button class="btn btn-primary" >Logout</button></a>

            </ul>

        </div>
        <br>
       
        <div class="shadow"></div>
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
                nav.showMonths = 2;
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

                /*dp.onEventMoved = function(args) {
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
                };*/

                // event creating
                /*dp.onTimeRangeSelected = function(args) {
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

                };*/

                /*dp.onEventClick = function(args) {
                    alert("clicked: " + args.e.id());
                };*/

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

    </body>
</html>

